<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\AccountMove;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountMoveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountMove::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 100)),
        'company_id' => $this->faker->word,
        'account_journal_id' => $this->faker->word,
        'ref' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'date' => $this->faker->date('Y-m-d'),
        'state' => $this->faker->text($this->faker->numberBetween(5, 10)),
        'amount' => $this->faker->numberBetween(0, 9223372036854775807),
        'move_type' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'narration' => $this->faker->boolean,
        'stock_picking_id' => $this->faker->word
        ];
    }
}
