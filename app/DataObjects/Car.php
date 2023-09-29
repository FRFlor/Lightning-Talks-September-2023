<?php

namespace App\DataObjects;

class Car
{
    public function __construct(
        public string $make,
        public string $model,
        public int    $year,
        public string $color,
        public string $fuelType
    )
    {
    }

    /** @param array{make: string, model: string, year: int, color: string, fuelType: string} $rawCar */
    public static function fromArray(array $rawCar): self
    {
        return new self(...$rawCar);
    }
}
