<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\StockPicking;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockPickingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StockPicking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'warehouse_id' => $this->faker->word,
        'stock_picking_type_id' => $this->faker->word,
        'name' => $this->faker->text($this->faker->numberBetween(5, 70)),
        'quantity' => $this->faker->numberBetween(0, 999),
        'state' => $this->faker->text($this->faker->numberBetween(5, 15)),
        'external_references' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'vendor_id' => $this->faker->word,
        'note' => $this->faker->text($this->faker->numberBetween(5, 100))
        ];
    }
}
