<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\StockPickingType;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockPickingTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StockPickingType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'code' => $this->faker->text($this->faker->numberBetween(5, 20))
        ];
    }
}
