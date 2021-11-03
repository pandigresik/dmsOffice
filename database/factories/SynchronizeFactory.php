<?php

namespace Database\Factories;

use App\Models\Synchronize;
use Illuminate\Database\Eloquent\Factories\Factory;

class SynchronizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Synchronize::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'table_name' => $this->faker->text($this->faker->numberBetween(5, 60))
        ];
    }
}
