<?php

namespace Database\Factories\Sales;

use App\Models\Sales\Discounts;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Discounts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jenis' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'name' => $this->faker->text($this->faker->numberBetween(5, 100)),
        'start_date' => $this->faker->date('Y-m-d'),
        'end_date' => $this->faker->date('Y-m-d'),
        'split' => $this->faker->boolean,
        'main_dms_inv_product_id' => $this->faker->text($this->faker->numberBetween(5, 10)),
        'main_quota' => $this->faker->numberBetween(0, 999),
        'bundling_dms_inv_product_id' => $this->faker->text($this->faker->numberBetween(5, 10)),
        'bundling_quota' => $this->faker->numberBetween(0, 999),
        'max_quota' => $this->faker->numberBetween(0, 999),
        'state' => $this->faker->lexify('?????')
        ];
    }
}
