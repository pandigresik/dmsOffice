<?php

namespace Database\Factories\Base;

use App\Models\Base\VehicleGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VehicleGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'capacity' => $this->faker->numberBetween(0, 999),
        'uom' => $this->faker->text($this->faker->numberBetween(5, 30)),
        'description' => $this->faker->text($this->faker->numberBetween(5, 100))
        ];
    }
}
