<?php

declare(strict_types=1);

namespace App\DDD\Domain\ValueObject;

use App\DDD\Domain\ValueObject\IntegerNumber;

class NaturalNumber extends IntegerNumber
{
    /**
     * @var int
     */
    private int $value;

    public function __construct(int $value)
    {
        parent::__construct($value);
        $this->isValid($value);
        $this->value = $value;
    }

    /**
     * [Description for value]
     *
     * @return int
     * 
     */
    public function value(): int
    {
        return $this->value;
    }

    /**
     * [Description for isValid]
     *
     * @param int $value
     * 
     * @return void
     * 
     */
    public function isValid(int $value): void
    {
        if ($value < 0) {
            throw new \Exception("Not a natural number.");
        }
    }
}