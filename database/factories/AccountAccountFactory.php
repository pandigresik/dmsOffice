<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\AccountAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'code' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'company_id' => $this->faker->word,
        'is_off_balance' => $this->faker->boolean,
        'reconcile' => $this->faker->boolean,
        'internal_type' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'internal_group' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'note' => $this->faker->text($this->faker->numberBetween(5, 50))
        ];
    }
}
