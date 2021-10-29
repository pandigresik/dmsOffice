<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\DmsInvCarriervehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class DmsInvCarriervehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DmsInvCarriervehicle::class;

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
        'szVehicleNo' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szDriverName' => $this->faker->lastName
        ];
    }
}
