<?php

namespace App\DDD\Application\Service;

use Doctrine\Common\Collections\ArrayCollection;
use App\DDD\Domain\AbstractDiscount as Discount;

interface DiscountManagerInterface
{
    public function loadDiscountsFromDbDiscountRules();

    public function setDiscounts(ArrayCollection $discounts): self;

    public function addDiscount(Discount $discount);

    public function applyDiscounts();

    public function applyMaxDiscount();
}