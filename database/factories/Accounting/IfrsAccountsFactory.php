<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\IfrsAccounts;
use Illuminate\Database\Eloquent\Factories\Factory;

class IfrsAccountsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IfrsAccounts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entity_id' => $this->faker->word,
        'category_id' => $this->faker->word,
        'currency_id' => $this->faker->word,
        'code' => $this->faker->numberBetween(0, 999),
        'name' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'description' => $this->faker->text($this->faker->numberBetween(5, 1000)),
        'account_type' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'destroyed_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
