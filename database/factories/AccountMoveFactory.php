<?php

namespace Database\Factories\Finance;

use App\Models\Finance\AccountMove;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountMoveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountMove::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'date' => $this->faker->date('Y-m-d'),
        'reference' => $this->faker->text($this->faker->numberBetween(5, 80)),
        'narration' => $this->faker->boolean,
        'state' => $this->faker->text($this->faker->numberBetween(5, 15))
        ];
    }
}
