<?php

namespace App\DDD\Application\Service\DTO\Transformer;

use App\DDD\Domain\Model\PriceModel;

class ProductResponseDto
{

    /**
     * [Description for $sku]
     *
     * @var string
     */
    private string $sku;

    /**
     * [Description for $name]
     *
     * @var string
     */
    private string $name;

    /**
     * [Description for $category]
     *
     * @var string
     */
    private string $category;

    /**
     * [Description for $price]
     *
     * @var PriceModel
     */
    private PriceModel $price;

    /**
     * Get the value of sku
     *
     * @return string
     * 
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * Set the value of sku
     *
     * @param string $sku
     * 
     * @return self
     * 
     */
    public function setSku(string $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return string
     * 
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     * 
     * @return self
     * 
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of category
     *
     * @return string
     * 
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @param string $category
     * 
     * @return self
     * 
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of price
     *
     * @return PriceModel
     * 
     */
    public function getPrice(): PriceModel
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @param PriceModel $price
     * 
     * @return self
     * 
     */
    public function setPrice(PriceModel $price): self
    {
        $this->price = $price;

        return $this;
    }
}