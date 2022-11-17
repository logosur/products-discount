<?php

namespace App\DDD\Domain\ValueObject;

class Currency
{
    /**
     * @var string
     */
    const EUR = 'eur';

    /**
     * @var string
     */
    private string $value;

    public function __construct(string $value)
    {
        $this->isValid($value); 
        $this->value = $value;
    }

    /**
     * [Description for value]
     *
     * @return string
     * 
     */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * [Description for isValid]
     *
     * @param string $value
     * 
     * @return void
     * 
     */
    private function isValid(string $value): void
    {
        if (!\in_array($value, [self::EUR])) {
            throw new \Exception("Wrong currency.");
        }
    }
}