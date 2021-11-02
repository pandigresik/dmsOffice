<?php

namespace Database\Factories\Base;

use App\Models\Base\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->text($this->faker->numberBetween(5, 30)),
        'name' => $this->faker->text($this->faker->numberBetween(5, 60)),
        'origin' => $this->faker->word,
        'origin_place' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'origin_additional_price' => $this->faker->numberBetween(0, 9223372036854775807),
        'destination' => $this->faker->word,
        'destination_place' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'destination_additional_price' => $this->faker->numberBetween(0, 9223372036854775807),
        'price' => $this->faker->numberBetween(0, 9223372036854775807),
        'distance' => $this->faker->numberBetween(0, 9223372036854775807),
        'description' => $this->faker->text($this->faker->numberBetween(5, 60))
        ];
    }
}
