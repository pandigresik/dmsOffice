<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\ProductPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductPrice::class;

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
