<?php

namespace Database\Factories\Base;

use App\Models\Base\UomCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class UomCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UomCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 50))
        ];
    }
}
