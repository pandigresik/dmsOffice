<?php

namespace Database\Factories\Base;

use App\Models\Base\VendorExpedition;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorExpeditionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VendorExpedition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'address' => $this->faker->text($this->faker->numberBetween(5, 80)),
        'email' => $this->faker->email
        ];
    }
}
