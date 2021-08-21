<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\AccountJournal;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountJournalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountJournal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'code' => $this->faker->text($this->faker->numberBetween(5, 8)),
        'company_id' => $this->faker->word,
        'default_debit_account_id' => $this->faker->word,
        'default_credit_account_id' => $this->faker->word,
        'type' => $this->faker->text($this->faker->numberBetween(5, 4096))
        ];
    }
}
