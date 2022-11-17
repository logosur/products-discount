<?php

declare(strict_types=1);

namespace App\DDD\Domain\ValueObject;

class NumberValueObject
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
        
    }
}
