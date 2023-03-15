<?php

namespace App\DDD\Domain;

use App\DDD\Domain\ValueObject\Price;

/**
 * Apply fixed discounts values.
 */
class FixedDiscount extends AbstractDiscount
{
    /**
     * Summary of price
     * @var Price
     */
    private Price $price;

    /**
     * Summary of amount
     * @var float
     */
    private float $amount;

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
        return $this->price - $this->amount;
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