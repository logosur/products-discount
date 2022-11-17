<?php

declare(strict_types=1);

namespace App\DDD\Domain\ValueObject;

use App\DDD\Domain\ValueObject\NumberValueObject;

/**
 * [Description IntegerNumber]
 */
class IntegerNumber extends NumberValueObject
{
    /**
     * @var int
     */
    private int $value;

    public function __construct(int $value)
    {
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
    private function isValid(int $value): void
    {
        if (!is_integer($value)) {
            throw new \Exception("Value is not integer");
        }
    }
}