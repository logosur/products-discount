<?php

namespace App\DDD\Domain;

interface DiscountInterface
{
    public function getFinalPrice();

    public function getAmount();
}