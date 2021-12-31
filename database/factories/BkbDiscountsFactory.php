<?php

namespace Database\Factories\Sales;

use App\Models\Sales\BkbDiscounts;
use Illuminate\Database\Eloquent\Factories\Factory;

class BkbDiscountsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BkbDiscounts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'szDocId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szProductId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szSalesId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szBranchId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'decQty' => $this->faker->numberBetween(0, 9223372036854775807),
        'discPrinciple' => $this->faker->numberBetween(0, 9223372036854775807),
        'discDistributor' => $this->faker->numberBetween(0, 9223372036854775807),
        'sistemPrinciple' => $this->faker->numberBetween(0, 9223372036854775807),
        'sistemDistributor' => $this->faker->numberBetween(0, 9223372036854775807),
        'selisihPrinciple' => $this->faker->numberBetween(0, 9223372036854775807),
        'selisihDistributor' => $this->faker->numberBetween(0, 9223372036854775807)
        ];
    }
}
