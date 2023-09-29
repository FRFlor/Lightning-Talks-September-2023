<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\File;
use Tests\TestCase;

class ExampleUsingArraysForEverythingTest extends TestCase
{

    public function test_with_a_single_car(): void
    {
        $car = $this->getCarUsingArray();

        $this->assertNotEmpty($car);
    }

    public function test_with_an_array_of_cars(): void
    {
        $cars = $this->getCarsUsingArrays();

        $this->assertNotEmpty($cars);
    }

    /** @return array{make: string, model: string, year: int, color: string, fuelType: string} */
    private function getCarUsingArray(): array
    {
        return [
            "make" => "Honda",
            "model" => "Civic",
            "year" => 2020,
            "color" => "Blue",
            "fuelType" => "Gasoline"
        ];
    }

    /** @return array{array{make: string, model: string, year: int, color: string, fuelType: string}} */
    private function getCarsUsingArrays(): array
    {
        return File::json(resource_path("json/cars.json"));
    }
}
