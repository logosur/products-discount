<?php

declare(strict_types=1);

namespace App\DDD\Domain\ValueObject;

use App\DDD\Domain\ValueObject\Number;

class Price extends NaturalNumber
{
    /**
     * @var int
     */
    private int $value;

    public function __construct(int $value)
    {
        parent::isValid($value); 
        $this->value = $value;
    }

    /**
     * [Description for getValue]
     *
     * @return int
     * 
     */
    public function getValue(): int
    {
        return $this->value;
    }
}