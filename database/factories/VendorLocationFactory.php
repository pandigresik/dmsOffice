<?php

namespace Database\Factories\Base;

use App\Models\Base\VendorLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorLocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VendorLocation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'city' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'state' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'additional_cost' => $this->faker->numberBetween(0, 999),
        'route_trip_id' => $this->faker->word
        ];
    }
}
