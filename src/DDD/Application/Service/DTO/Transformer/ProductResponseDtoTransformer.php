<?php

declare(strict_types=1);

namespace App\DDD\Application\Service\DTO\Transformer;

use App\DDD\Infrastructure\Persistence\Entity\Product;
use App\DDD\Domain\Model\PriceModel;
use App\DDD\Application\Service\DTO\Transformer\ProductResponseDto;

/**
 * [Description ProductResponseDtoTransformer]
 */
class ProductResponseDtoTransformer extends AbstractResponseDtoTransformer
{
    /**
     * @param Product $product;
     * @param PriceModel $piceModel;
     * 
     * @return ProductResponseDto;
     */
    public function transformComposeFromObject(Product $product, PriceModel $price): ProductResponseDto
    {
        $dto = new ProductResponseDto();
        $dto->setSku($product->getSku());
        $dto->setName($product->getName());
        $dto->setCategory($product->getCategory()->getName());
        $dto->setPrice($price);

        return $dto;
    }
}

