<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\IfrsVats;
use Illuminate\Database\Eloquent\Factories\Factory;

class IfrsVatsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IfrsVats::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entity_id' => $this->faker->word,
        'account_id' => $this->faker->word,
        'code' => $this->faker->lexify('?????'),
        'name' => $this->faker->text($this->faker->numberBetween(5, 300)),
        'rate' => $this->faker->numberBetween(0, 9223372036854775807),
        'destroyed_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
