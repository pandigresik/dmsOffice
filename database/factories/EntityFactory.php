<?php

namespace Database\Factories\Base;

use App\Models\Base\Entity;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'internal_code' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'description' => $this->faker->text($this->faker->numberBetween(5, 255))
        ];
    }
}
