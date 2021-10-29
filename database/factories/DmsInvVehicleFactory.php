<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\DmsInvVehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class DmsInvVehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DmsInvVehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'iId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szName' => $this->faker->lastName,
        'szDescription' => $this->faker->text($this->faker->numberBetween(5, 200)),
        'szBranchId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szPoliceNo' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szChassisNo' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szMachineNo' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'decWeight' => $this->faker->numberBetween(0, 9223372036854775807),
        'decVolume' => $this->faker->numberBetween(0, 9223372036854775807),
        'szVehicleTypeId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'dtmVehicleLicense' => $this->faker->date('Y-m-d H:i:s'),
        'szUserCreatedId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'szUserUpdatedId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'dtmCreated' => $this->faker->date('Y-m-d H:i:s'),
        'dtmLastUpdated' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
