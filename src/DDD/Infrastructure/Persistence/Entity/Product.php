<?php

namespace App\DDD\Infrastructure\Persistence\Entity;

use App\DDD\Infrastructure\Persistence\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ORM\Table(name="product", uniqueConstraints={@ORM\UniqueConstraint(name="sku", columns={"name", "sku"})})
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $sku;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * Get the value of id
     *
     * @return int|null
     * 
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of Sku
     *
     * @return string|null
     * 
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * Set the value of Sku
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
     * Get the value of Name
     *
     * @return string|null
     * 
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of Name
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
     * Get the value of Price
     *
     * @return int|null
     * 
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * Set the value of Price
     *
     * @param int $price
     * 
     * @return self
     * 
     */
    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of Category
     *
     * @return Category|null
     * 
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * Get the value of Category
     *
     * @param Category|null $category
     * 
     * @return self
     * 
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
