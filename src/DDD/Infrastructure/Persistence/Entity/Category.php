<?php

namespace App\DDD\Infrastructure\Persistence\Entity;

use App\DDD\Infrastructure\Persistence\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

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
     * Set the value of id
     *
     * @param int $id
     * 
     * @return self
     * 
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return string|null
     * 
     */
    public function getName(): ?string
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
}
