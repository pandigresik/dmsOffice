<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\IfrsEntities;
use Illuminate\Database\Eloquent\Factories\Factory;

class IfrsEntitiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IfrsEntities::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'currency_id' => $this->faker->word,
        'parent_id' => $this->faker->word,
        'name' => $this->faker->text($this->faker->numberBetween(5, 300)),
        'multi_currency' => $this->faker->boolean,
        'mid_year_balances' => $this->faker->boolean,
        'year_start' => $this->faker->numberBetween(0, 999),
        'destroyed_at' => $this->faker->date('Y-m-d H:i:s'),
        'locale' => $this->faker->text($this->faker->numberBetween(5, 20))
        ];
    }
}
