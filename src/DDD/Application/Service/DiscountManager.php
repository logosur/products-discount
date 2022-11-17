<?php

namespace App\DDD\Application\Service;

use App\DDD\Infrastructure\Persistence\Entity\Product;
use App\DDD\Domain\PercentageDiscount;
use App\DDD\Domain\AbstractDiscount as Discount;
use App\DDD\Domain\Model\PriceModel;
use App\DDD\Domain\ValueObject\Price;
use App\DDD\Infrastructure\Persistence\Repository\DiscountRuleRepository;
use Doctrine\Common\Collections\ArrayCollection;

class DiscountManager implements DiscountManagerInterface
{
    /**
     * @var ArrayCollection
     */
    private ArrayCollection $discounts;

    /**
     * @var Discount|null
     */
    private ?Discount $discount;

    /**
     * @var PriceModel
     */
    private PriceModel $priceModel;

    /**
     * @var Product
     */
    private Product $product;

    public function __construct(?DiscountRuleRepository $discountRuleRepository)
    {
        $discountRuleRepository ? $this->discountRuleRepository = $discountRuleRepository : null;
        $this->discounts = new ArrayCollection();
        $this->discount = null;
    }

    /**
     * [Description for setProduct]
     *
     * @param Product $product
     * 
     * @return self
     * 
     */
    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * [Description for loadDiscountsFromDbDiscountRules]
     *
     * @return void
     * 
     */
    public function loadDiscountsFromDbDiscountRules(): void
    {
        if ($discountRule = $this->discountRuleRepository->findOneBy(['rule' => 'category', 'objectId' => $this->product->getCategory()->getId()])) {
            $this->addDiscount(
                new PercentageDiscount(
                    new Price($this->product->getPrice()),
                    $discountRule->getAmount()
                )
            );
        }
        
        if ($discountRule = $this->discountRuleRepository->findOneBy(['rule' => 'sku', 'objectId' => $this->product->getSku()])) {
            $this->addDiscount(
                new PercentageDiscount(
                    new Price($this->product->getPrice()),
                    $discountRule->getAmount()
                )
            );
        }
    }

    /**
     * [Description for setDiscounts]
     *
     * @param ArrayCollection $discounts
     * 
     * @return self
     * 
     */
    public function setDiscounts(ArrayCollection $discounts): self
    {
        $this->discounts = $discounts;

        return $this;
    }

    /**
     * [Description for addDiscount]
     *
     * @param Discount $discount
     * 
     * @return self
     * 
     */
    public function addDiscount(Discount $discount): self
    {
        $this->discounts->add($discount);

        return $this;
    }

    /**
     * [Description for getDiscounts]
     *
     * @return ArrayCollection
     * 
     */
    public function getDiscounts() : ArrayCollection
    {
        return $this->discounts;
    }

    /**
     * [Description for applyDiscounts]
     *
     * @return [type]
     * 
     */
    public function applyDiscounts()
    {
        if ($this->discounts->count() == 1) {
            $this->discount = $this->discounts->first();
        } elseif ($this->discounts->count() > 1) {
            $this->applyMaxDiscount();
        }

        $this->apply();
    }

    /**
     * [Description for applyMaxDiscount]
     *
     * @return [type]
     * 
     */
    public function applyMaxDiscount()
    {
        $maxDiscount = null;

        foreach ($this->discounts as $key => $discount) {
            if (is_null($maxDiscount)) {
                $maxDiscount = $discount;
            } elseif ($maxDiscount->getAmount() < $discount->getAmount()) {
                $maxDiscount = $discount;
            }
        };

        $this->discount = $maxDiscount;
        $this->apply();
    }

    /**
     * [Description for apply]
     *
     * @return [type]
     * 
     */
    public function apply()
    {
        $this->priceModel = new PriceModel();
        $this->priceModel->setOriginal($this->product->getPrice());
        $this->priceModel->setFinal(!is_null($this->discount) ? $this->discount->getFinalPrice() : $this->product->getPrice());
        $this->priceModel->setDiscountPercentage(!is_null($this->discount) ? $this->discount->getAmount() : null);
    }

    /**
     * [Description for getPriceModel]
     *
     * @return PriceModel
     * 
     */
    public function getPriceModel(): PriceModel
    {
        return $this->priceModel;
    }
}