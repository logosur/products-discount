<?php

declare(strict_types=1);

namespace Tests\DDD\Domain;

use PHPUnit\Framework\TestCase;
use App\DDD\Application\Service\DiscountManager;
use App\DDD\Domain\PercentageDiscount;
use App\DDD\Domain\ValueObject\Price;
use App\DDD\Infrastructure\Persistence\Entity\Product;
use App\DDD\Infrastructure\Persistence\Entity\Category;
use Doctrine\Common\Collections\ArrayCollection;

final class DiscountManagerTest extends TestCase
{
    /**
     * Tests for Discount manager when no two or more discounts applies
     * and we must decide the only higher one to use.
     *
     * @return void
     * 
     */
    public function testApplyDiscountsPriority(): void
    {
        $category = new Category();
        $category->setId(1);
        $category->setName('boots');

        $product = new Product();
        $product->setName('test product');
        $product->setSku('000003');
        $product->setPrice(71000);
        $product->setCategory($category);

        $dm = new DiscountManager(null);
        
        $discounts = new ArrayCollection([
            new PercentageDiscount(
                new Price($product->getPrice()),
                30
            ),
            new PercentageDiscount(
                new Price($product->getPrice()),
                15
            )
        ]);

        $dm->setProduct($product);
        // Not getting discounts from discountRules database.
        $dm->setDiscounts($discounts);
        $dm->applyDiscounts();

        $priceModel = $dm->getPriceModel();
        
        $this->assertEquals($priceModel->getFinal(), 49700);
    }

    /**
     * Tests for Discount manager when no discounts are applied.
     *
     * @return void
     * 
     */
    public function testNoDiscount(): void
    {
        $category = new Category();
        $category->setId(1);
        $category->setName('boots');

        $product = new Product();
        $product->setName('test product');
        $product->setSku('000003');
        $product->setPrice(71000);
        $product->setCategory($category);

        $dm = new DiscountManager(null);
        $dm->setProduct($product);
        $dm->applyDiscounts();

        $priceModel = $dm->getPriceModel();
        
        $this->assertEquals($priceModel->getFinal(), 71000);
        $this->assertEquals($priceModel->getDiscountPercentage(), null);
    }
}