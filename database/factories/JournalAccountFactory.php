<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\JournalAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class JournalAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JournalAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account_id' => $this->faker->text($this->faker->numberBetween(5, 15)),
        'szBranchId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'name' => $this->faker->text($this->faker->numberBetween(5, 100)),
        'debit' => $this->faker->numberBetween(0, 9223372036854775807),
        'credit' => $this->faker->numberBetween(0, 9223372036854775807),
        'balance' => $this->faker->numberBetween(0, 9223372036854775807),
        'state' => $this->faker->text($this->faker->numberBetween(5, 15))
        ];
    }
}
