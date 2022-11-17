<?php

namespace App\DDD\Domain;

use App\DDD\Domain\ValueObject\Price;

abstract class AbstractDiscount implements DiscountInterface
{
    /**
     * @var Price
     */
    private Price $price;

    /**
     * @var float
     */
    private float $amount;

    public function __construct(Price $price, float $amount)
    {
        $this->price = $price;
        $this->amount = $amount;
    }

    abstract public function getFinalPrice();

    abstract public function getAmount();
}