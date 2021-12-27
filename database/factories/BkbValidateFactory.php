<?php

namespace Database\Factories\Sales;

use App\Models\Sales\BkbValidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class BkbValidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BkbValidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'doc_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'dms_ar_customer_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'dms_pi_employee_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'disc_principle_sales' => $this->faker->numberBetween(0, 9223372036854775807),
        'disc_distributor_sales' => $this->faker->numberBetween(0, 9223372036854775807),
        'disc_principle_dms' => $this->faker->numberBetween(0, 9223372036854775807),
        'disc_distributor_dms' => $this->faker->numberBetween(0, 9223372036854775807),
        'invoiced' => $this->faker->boolean
        ];
    }
}
