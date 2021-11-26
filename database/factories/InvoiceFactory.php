<?php

namespace Database\Factories\Purchase;

use App\Models\Purchase\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

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
        'qty' => $this->faker->numberBetween(0, 999),
        'amount' => $this->faker->numberBetween(0, 9223372036854775807),
        'amount_discount' => $this->faker->numberBetween(0, 9223372036854775807),
        'state' => $this->faker->text($this->faker->numberBetween(5, 10)),
        'date_invoice' => $this->faker->date('Y-m-d'),
        'date_due' => $this->faker->date('Y-m-d'),
        'partner_id' => $this->faker->text($this->faker->numberBetween(5, 20))
        ];
    }
}
