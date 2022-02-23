<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\ShippingCostManual;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingCostManualFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShippingCostManual::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'origin_branch_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'destination_branch_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'carrier_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'date' => $this->faker->date('Y-m-d'),
        'do_references' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'sj_references' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'amount' => $this->faker->numberBetween(0, 9223372036854775807)
        ];
    }
}
