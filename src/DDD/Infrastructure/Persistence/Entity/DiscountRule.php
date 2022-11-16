<?php

namespace App\DDD\Infrastructure\Persistence\Entity;

use App\DDD\Infrastructure\Persistence\Repository\DiscountRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiscountRepository::class)
 */
class DiscountRule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $rule;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=2)
     */
    private $amount;

    /**
     * @ORM\Column(type="string")
     */
    private $objectId;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $discountType;

    /**
     * Get the value of id
     *
     * @return int
     * 
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of rule
     *
     * @return string
     * 
     */
    public function getRule(): string
    {
        return $this->rule;
    }

    /**
     * Set the value of rule
     *
     * @param string $rule
     * 
     * @return self
     * 
     */
    public function setRule(string $rule): self
    {
        $this->rule = $rule;

        return $this;
    }

    /**
     * Get the value of amount
     *
     * @return float
     * 
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */ 
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of objectId
     *
     * @return string
     * 
     */
    public function getObjectId(): string
    {
        return $this->objectId;
    }

    /**
     * Set the value of objectId
     *
     * @param string $objectId
     * 
     * @return self
     * 
     */
    public function setObjectId(string $objectId): self
    {
        $this->objectId = $objectId;

        return $this;
    }

    /**
     * Get the value of discountType
     *
     * @return string
     * 
     */
    public function getDiscountType(): string
    {
        return $this->discountType;
    }

    /**
     * Set the value of discountType
     *
     * @param string $discountType
     * 
     * @return self
     * 
     */
    public function setDiscountType(string $discountType): self
    {
        $this->discountType = $discountType;

        return $this;
    }
}
