<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\StockQuant;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockQuantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StockQuant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->word,
        'warehouse_id' => $this->faker->word,
        'quantity' => $this->faker->numberBetween(0, 999),
        'uom_id' => $this->faker->word
        ];
    }
}
