<?php

namespace Database\Factories\Base;

use App\Models\Base\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number_registration' => $this->faker->text($this->faker->numberBetween(5, 15)),
        'number_identity' => $this->faker->text($this->faker->numberBetween(5, 30)),
        'vehicle_group_id' => $this->faker->word
        ];
    }
}
