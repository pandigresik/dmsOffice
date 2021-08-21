<?php

namespace Database\Factories\Base;

use App\Models\Base\Uom;
use Illuminate\Database\Eloquent\Factories\Factory;

class UomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Uom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'uom_category_id' => $this->faker->word,
        'factor' => $this->faker->numberBetween(0, 9223372036854775807),
        'uom_type' => $this->faker->text($this->faker->numberBetween(5, 255))
        ];
    }
}
