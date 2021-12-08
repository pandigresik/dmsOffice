<?php

namespace Database\Factories\Finance;

use App\Models\Finance\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->text($this->faker->numberBetween(5, 30)),
        'type' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'reference' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'state' => $this->faker->text($this->faker->numberBetween(5, 10)),
        'estimate_date' => $this->faker->date('Y-m-d'),
        'pay_date' => $this->faker->date('Y-m-d'),
        'amount' => $this->faker->numberBetween(0, 9223372036854775807)
        ];
    }
}
