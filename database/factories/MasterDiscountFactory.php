<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\MasterDiscount;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterDiscountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterDiscount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->text($this->faker->numberBetween(5, 10)),
        'name' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'amount_value' => $this->faker->numberBetween(0, 9223372036854775807),
        'amount_procent' => $this->faker->numberBetween(0, 9223372036854775807),
        'start_date' => $this->faker->date('Y-m-d'),
        'end_date' => $this->faker->date('Y-m-d')
        ];
    }
}
