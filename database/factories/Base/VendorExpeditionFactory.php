<?php

namespace Database\Factories\Base;

use App\Models\Base\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vendor::class;

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
