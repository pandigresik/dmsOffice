<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\ProductCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'description' => $this->faker->text($this->faker->numberBetween(5, 100))
        ];
    }
}
