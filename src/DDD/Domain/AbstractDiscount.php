<?php

namespace App\DDD\Domain;

use App\DDD\Domain\ValueObject\Price;

/**
 * Summary of AbstractDiscount
 */
abstract class AbstractDiscount implements DiscountInterface
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
        $this->price = $price;
        $this->amount = $amount;
    }

    abstract public function getFinalPrice();

    abstract public function getAmount();
}