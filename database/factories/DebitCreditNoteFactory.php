<?php

namespace Database\Factories\Finance;

use App\Models\Finance\DebitCreditNote;
use Illuminate\Database\Eloquent\Factories\Factory;

class DebitCreditNoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DebitCreditNote::class;

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
        'partner_type' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'partner_id' => $this->faker->text($this->faker->numberBetween(5, 30)),
        'issue_date' => $this->faker->date('Y-m-d'),
        'reference' => $this->faker->text($this->faker->numberBetween(5, 30)),
        'invoice_id' => $this->faker->word,
        'description' => $this->faker->boolean
        ];
    }
}
