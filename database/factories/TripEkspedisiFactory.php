<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\TripEkspedisi;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripEkspedisiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TripEkspedisi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dms_inv_carrier_id' => $this->faker->numberBetween(0, 999),
        'trip_id' => $this->faker->word
        ];
    }
}
