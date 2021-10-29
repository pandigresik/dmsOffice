<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\DmsInvWarehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class DmsInvWarehouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DmsInvWarehouse::class;

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
        'bAllowForSalesTransaction' => $this->faker->boolean,
        'szUserCreatedId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'szUserUpdatedId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'dtmCreated' => $this->faker->date('Y-m-d H:i:s'),
        'dtmLastUpdated' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
