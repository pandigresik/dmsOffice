<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\ProductPriceLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPriceLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductPriceLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dms_inv_product_id' => $this->faker->numberBetween(0, 999),
        'price' => $this->faker->numberBetween(0, 9223372036854775807),
        'start_date' => $this->faker->date('Y-m-d')
        ];
    }
}
