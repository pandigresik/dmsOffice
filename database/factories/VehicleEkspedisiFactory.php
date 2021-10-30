<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\VehicleEkspedisi;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleEkspedisiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VehicleEkspedisi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dms_inv_vehicle_id' => $this->faker->numberBetween(0, 999)
        ];
    }
}
