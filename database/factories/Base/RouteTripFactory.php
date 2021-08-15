<?php

namespace Database\Factories\Base;

use App\Models\Base\RouteTrip;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouteTripFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RouteTrip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 60)),
        'description' => $this->faker->text($this->faker->numberBetween(5, 60)),
        'vehicle_group_id' => $this->faker->word,
        'origin' => $this->faker->word,
        'destination' => $this->faker->word,
        'price' => $this->faker->numberBetween(0, 9223372036854775807)
        ];
    }
}
