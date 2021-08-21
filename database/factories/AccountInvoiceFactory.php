<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\AccountInvoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountInvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountInvoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'number' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'amount_total' => $this->faker->numberBetween(0, 9223372036854775807),
        'company_id' => $this->faker->word,
        'vendor_id' => $this->faker->word,
        'account_journal_id' => $this->faker->word,
        'type' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'references' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'comment' => $this->faker->boolean,
        'state' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'date_invoice' => $this->faker->date('Y-m-d'),
        'date_due' => $this->faker->date('Y-m-d')
        ];
    }
}
