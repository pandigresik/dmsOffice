<?php

namespace Database\Factories\Base;

use App\Models\Base\VendorContact;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VendorContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'position' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'email' => $this->faker->email,
        'phone' => $this->faker->numerify('0##########'),
        'mobile' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'description' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'address' => $this->faker->text($this->faker->numberBetween(5, 255)),
        'city' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'state' => $this->faker->text($this->faker->numberBetween(5, 50))
        ];
    }
}
