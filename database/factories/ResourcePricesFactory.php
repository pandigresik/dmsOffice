<?php

namespace Database\Factories;

use App\Models\ResourcePrices;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourcePricesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ResourcePrices::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'resource_id' => $this->faker->numberBetween(0, 999),
            'price' => $this->faker->numberBetween(0, 9223372036854775807)
        ];
    }
}
