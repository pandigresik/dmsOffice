<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\LocationEkspedisi;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationEkspedisiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LocationEkspedisi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dms_inv_carrier_id' => $this->faker->numberBetween(0, 999),
        'address' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'city' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'state' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'additional_cost' => $this->faker->numberBetween(0, 999)
        ];
    }
}
