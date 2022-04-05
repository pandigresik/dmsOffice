<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\ProductStock;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductStockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductStock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'first_stock' => $this->faker->numberBetween(0, 999),
        'supplier_in' => $this->faker->numberBetween(0, 999),
        'mutation_in' => $this->faker->numberBetween(0, 999),
        'distribution_in' => $this->faker->numberBetween(0, 999),
        'supplier_out' => $this->faker->numberBetween(0, 999),
        'mutation_out' => $this->faker->numberBetween(0, 999),
        'distribution_out' => $this->faker->numberBetween(0, 999),
        'morphing' => $this->faker->numberBetween(0, 999),
        'last_stock' => $this->faker->numberBetween(0, 999),
        'period' => $this->faker->text($this->faker->numberBetween(5, 7)),
        'additional_info' => $this->faker->boolean
        ];
    }
}
