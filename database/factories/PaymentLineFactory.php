<?php

namespace Database\Factories\Finance;

use App\Models\Finance\PaymentLine;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentLine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_id' => $this->faker->word,
        'invoice_id' => $this->faker->word,
        'amount' => $this->faker->numberBetween(0, 9223372036854775807),
        'amount_cn' => $this->faker->numberBetween(0, 9223372036854775807),
        'amount_dn' => $this->faker->numberBetween(0, 9223372036854775807),
        'amount_total' => $this->faker->numberBetween(0, 9223372036854775807)
        ];
    }
}
