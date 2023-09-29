<?php

namespace Tests\Feature;

use App\DataObjects\Car;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class ExampleUsingDataObjectsTest extends TestCase
{

    public function test_with_a_single_car(): void
    {
        $car = $this->getCarUsingDataObject();

        $this->assertNotEmpty($car);
    }

    public function test_with_an_array_of_cars(): void
    {
        $cars = $this->getCarsUsingDataObjects();

        $this->assertNotEmpty($cars);
    }

    private function getCarUsingDataObject(): Car
    {
        return new Car(
            make: "Honda",
            model: "Civic",
            year: 2020,
            color: "Blue",
            fuelType: "Gasoline"
        );
    }

    /** @return Car[] */
    private function getCarsUsingDataObjects(): array
    {
        return array_map(fn(array $rawCar) => Car::fromArray($rawCar), File::json(resource_path("json/cars.json")));
    }
}
