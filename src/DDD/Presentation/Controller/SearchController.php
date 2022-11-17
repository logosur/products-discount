<?php

namespace App\DDD\Presentation\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\DDD\Application\Service\DiscountManager;
use App\DDD\Application\Service\DTO\Transformer\ProductResponseDtoTransformer;
use App\DDD\Domain\PercentageDiscount;
use App\DDD\Domain\ValueObject\Price;
use App\DDD\Infrastructure\Persistence\Entity\Product;
use App\DDD\Infrastructure\Persistence\Entity\Category;
use Doctrine\Common\Collections\ArrayCollection;
use App\DDD\Infrastructure\Persistence\Repository\DiscountRuleRepository;
use App\DDD\Infrastructure\Persistence\Repository\ProductRepository;
use App\DDD\Infrastructure\Persistence\Repository\CategoryRepository;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends AbstractController
{
    #[Route(path: '/products', name: 'app_search', methods: ['GET'])]
    public function index(
        DiscountManager $discountManager,
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        ProductResponseDtoTransformer $productResponseDtoTransformer,
        Request $request
    ): JsonResponse
    {
        $productsDto = [];
        $categoryId = $request->query->get('category');
        $priceLessThan = $request->query->get('priceLessThan');

        $category = $categoryRepository->find($categoryId);

        /**
         * As is required by specification that input args must come
         * from query string, can't be auto-validated by Symfony/Validator
         */
        if (filter_var($categoryId, FILTER_VALIDATE_INT) === false || !$category) {
            return $this->json([
                'message' => 'Wrong or missing category',
                'data' => [],
            ]);
        }

        $criteria = new Criteria();
        $criteria->where(Criteria::expr()->eq('category', $category));

        if (!empty($priceLessThan)) {
            $criteria->andWhere(Criteria::expr()->lt('price', $priceLessThan));
        }

        $criteria->setMaxResults(5);

        if (!$products = $productRepository->matching($criteria)) {
            return $this->json([
                'message' => 'No data available',
                'data' => [],
            ]);
        }

        foreach ($products as $i => $product) {
            $discountManager->setProduct($product);
            $discountManager->loadDiscountsFromDbDiscountRules();
            $discountManager->applyDiscounts();
            $priceModel = $discountManager->getPriceModel();
            
            $productsDto[] = $productResponseDtoTransformer->transformComposeFromObject($product, $priceModel);
        }

        return $this->json([
            'message' => sizeof($productsDto) . ' Products found.',
            'data' => $productsDto
        ]);
    }
}
