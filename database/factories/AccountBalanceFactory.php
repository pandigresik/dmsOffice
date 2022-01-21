<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\AccountBalance;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountBalanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountBalance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->text($this->faker->numberBetween(5, 10)),
        'amount' => $this->faker->numberBetween(0, 9223372036854775807),
        'balance_date' => $this->faker->date('Y-m-d')
        ];
    }
}
