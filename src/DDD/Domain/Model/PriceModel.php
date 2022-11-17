<?php

namespace App\DDD\Domain\Model;

class PriceModel
{
    /**
     * @var int
     */
    private int $original;

    /**
     * @var int
     */
    private int $final;

    /**
     * @var string|null
     */
    private ?string $discount_percentage;

    /**
     * @var string
     */
    private string $currency;

    public function __construct()
    {
        $this->currency = 'EUR';
        $this->discount_percentage = null;
    }

    /**
     * Get the value of original
     *
     * @return int
     * 
     */
    public function getOriginal(): int
    {
        return $this->original;
    }

    /**
     * Set the value of original
     *
     * @param int $original
     * 
     * @return self
     * 
     */
    public function setOriginal(int $original): self
    {
        $this->original = $original;

        return $this;
    }

    /**
     * Get the value of final
     *
     * @return int
     * 
     */
    public function getFinal(): int
    {
        return $this->final;
    }

    /**
     * Set the value of final
     *
     * @param int $final
     * 
     * @return self
     * 
     */
    public function setFinal(int $final): self
    {
        $this->final = $final;

        return $this;
    }

    /**
     * Get the value of discount_percentage
     *
     * @return string|null
     * 
     */
    public function getDiscountPercentage(): ?string
    {
        return !is_null($this->discount_percentage) ? $this->discount_percentage . '%' : $this->discount_percentage;
    }

    /**
     * Set the value of discount_percentage
     *
     * @return  self
     */ 
    public function setDiscountPercentage(?float $discount_percentage): self
    {
        $this->discount_percentage = $discount_percentage;

        return $this;
    }

    /**
     * Get the value of currency
     *
     * @return string
     * 
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Set the value of currency
     *
     * @param string $currency
     * 
     * @return self
     * 
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }
}