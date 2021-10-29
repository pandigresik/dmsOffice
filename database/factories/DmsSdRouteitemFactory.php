<?php

namespace Database\Factories\Sales;

use App\Models\Sales\DmsSdRouteitem;
use Illuminate\Database\Eloquent\Factories\Factory;

class DmsSdRouteitemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DmsSdRouteitem::class;

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
        'szCustomerId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'intDay1' => $this->faker->numberBetween(0, 999),
        'intDay2' => $this->faker->numberBetween(0, 999),
        'intDay3' => $this->faker->numberBetween(0, 999),
        'intDay4' => $this->faker->numberBetween(0, 999),
        'intDay5' => $this->faker->numberBetween(0, 999),
        'intDay6' => $this->faker->numberBetween(0, 999),
        'intDay7' => $this->faker->numberBetween(0, 999),
        'intWeek1' => $this->faker->numberBetween(0, 999),
        'intWeek2' => $this->faker->numberBetween(0, 999),
        'intWeek3' => $this->faker->numberBetween(0, 999),
        'intWeek4' => $this->faker->numberBetween(0, 999)
        ];
    }
}
