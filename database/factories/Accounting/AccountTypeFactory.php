<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\AccountType;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'include_initial_balance' => $this->faker->boolean,
        'type' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'internal_group' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'note' => $this->faker->text($this->faker->numberBetween(5, 50))
        ];
    }
}
