<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\IfrsCurrencies;
use Illuminate\Database\Eloquent\Factories\Factory;

class IfrsCurrenciesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IfrsCurrencies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entity_id' => $this->faker->word,
        'name' => $this->faker->text($this->faker->numberBetween(5, 300)),
        'currency_code' => $this->faker->lexify('?????'),
        'destroyed_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
