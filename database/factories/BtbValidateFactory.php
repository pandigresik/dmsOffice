<?php

namespace Database\Factories\Purchase;

use App\Models\Purchase\BtbValidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class BtbValidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BtbValidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'doc_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'product_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'uom_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'ref_doc' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'qty' => $this->faker->numberBetween(0, 999),
        'qty_retur' => $this->faker->numberBetween(0, 999),
        'qty_reject' => $this->faker->numberBetween(0, 999),
        'invoiced' => $this->faker->boolean
        ];
    }
}
