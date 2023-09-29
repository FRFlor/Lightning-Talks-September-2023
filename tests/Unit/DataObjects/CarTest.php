<?php

namespace Tests\Unit\DataObjects;

use App\DataObjects\Car;
use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;

class CarTest extends TestCase
{
    public function test_from_array_fails_if_a_key_that_does_not_belong_to_cars_is_provided(): void
    {
        $this->expectException(\Error::class);

        $validCar = $this->getValidCarAsArray();

        Car::fromArray([...$validCar, "foobar" => "lefoob"]);
    }

    public function test_from_array_fails_if_a_required_key_is_missing(): void
    {
        $this->expectException(\Error::class);

        $validCar = $this->getValidCarAsArray();

        Car::fromArray(Arr::except($validCar, "year"));
    }

    /**
     * @return array{make: string, model: string, year: int, color: string, fuelType: string}
     */
    public function getValidCarAsArray(): array
    {
        return [
            "make" => "Honda",
            "year" => 2023,
            "model" => "Civic",
            "color" => "Blue",
            "fuelType" => "Gasoline"
        ];
    }
}
