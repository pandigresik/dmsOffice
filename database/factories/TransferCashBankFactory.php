<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\TransferCashBank;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransferCashBankFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransferCashBank::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_account' => $this->faker->text($this->faker->numberBetween(5, 10)),
        'number' => $this->faker->text($this->faker->numberBetween(5, 15)),
        'transaction_date' => $this->faker->date('Y-m-d'),
        'type' => $this->faker->text($this->faker->numberBetween(5, 5))
        ];
    }
}
