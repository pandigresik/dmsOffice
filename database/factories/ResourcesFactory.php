<?php

namespace Database\Factories;

use App\Models\Resources;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourcesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resources::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'grup' => $this->faker->text($this->faker->numberBetween(5, 30)),
            'name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'description' => $this->faker->boolean,
            'specification' => $this->faker->boolean
        ];
    }
}
