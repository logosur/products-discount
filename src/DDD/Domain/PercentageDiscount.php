<?php

namespace App\DDD\Domain;

use App\DDD\Domain\ValueObject\Price;

/**
 * [Description PercentageDiscount]
 */
class PercentageDiscount extends AbstractDiscount
{
    public function __construct(Price $price, float $amount)
    {
        $this->price = $price->getValue();
        $this->amount = $amount;
    }

    /**
     * [Description for getFinalPrice]
     *
     * @return int
     * 
     */
    public function getFinalPrice(): int
    {
        return round($this->price + (($this->amount / 100 ) * $this->price));
    }

    /**
     * [Description for getAmount]
     *
     * @return float
     * 
     */
    public function getAmount(): float
    {
        return $this->amount;
    }
}