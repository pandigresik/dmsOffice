<?php

namespace Database\Factories\Base;

use App\Models\Base\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 80)),
        'district' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'city' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'type' => $this->faker->text($this->faker->numberBetween(5, 4096))
        ];
    }
}
