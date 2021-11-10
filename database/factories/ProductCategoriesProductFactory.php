<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\ProductCategoriesProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoriesProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategoriesProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(0, 999),
        'product_categories_id' => $this->faker->word,
        'status' => $this->faker->boolean
        ];
    }
}
