<?php

declare(strict_types=1);

namespace Tests\DDD\Domain;

use PHPUnit\Framework\TestCase;
use App\DDD\Domain\PercentageDiscount;
use App\DDD\Domain\ValueObject\Price;

final class DiscountTest extends TestCase
{
    /**
     * Test Discount class when price value is wrong.
     *
     * @return void
     * 
     */
    public function testApplyDiscountExceptionPrice(): void
    {
        $this->expectException(\Exception::class);
        $discount = new PercentageDiscount(new Price(-1), 21);
    }

    /**
     * Test Discount class when all args are right and check expected value returned
     * after discount is applied.
     *
     * @return void
     * 
     */
    public function testApplyDiscount(): void
    {
        $discount = new PercentageDiscount(new Price(100), 21);
        $priceReduced = $discount->getFinalPrice();

        $this->assertEquals($priceReduced, 121);
    }
}