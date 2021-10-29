<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\DmsInvProductitemcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class DmsInvProductitemcategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DmsInvProductitemcategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'iId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'intItemNumber' => $this->faker->numberBetween(0, 999),
        'szCategoryTypeId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szCategoryValue' => $this->faker->text($this->faker->numberBetween(5, 50))
        ];
    }
}
