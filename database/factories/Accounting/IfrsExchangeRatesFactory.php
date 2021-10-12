<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\IfrsExchangeRates;
use Illuminate\Database\Eloquent\Factories\Factory;

class IfrsExchangeRatesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IfrsExchangeRates::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entity_id' => $this->faker->word,
        'currency_id' => $this->faker->word,
        'valid_from' => $this->faker->date('Y-m-d H:i:s'),
        'valid_to' => $this->faker->date('Y-m-d H:i:s'),
        'rate' => $this->faker->numberBetween(0, 9223372036854775807),
        'destroyed_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
