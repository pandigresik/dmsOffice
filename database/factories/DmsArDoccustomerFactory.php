<?php

namespace Database\Factories\Base;

use App\Models\Base\DmsArDoccustomer;
use Illuminate\Database\Eloquent\Factories\Factory;

class DmsArDoccustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DmsArDoccustomer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'iId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szDocId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'dtmDoc' => $this->faker->date('Y-m-d H:i:s'),
        'szCustomerId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szName' => $this->faker->lastName,
        'bNewCustomer' => $this->faker->boolean,
        'szIDCard' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'bHasDifferentCollectAddress' => $this->faker->boolean,
        'intPrintedCount' => $this->faker->numberBetween(0, 999),
        'szBranchId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szCompanyId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szDocStatus' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szHierarchyId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szHierarchyFull' => $this->faker->text($this->faker->numberBetween(5, 1000)),
        'szDocFUpId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szUserCreatedId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'szUserUpdatedId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'dtmCreated' => $this->faker->date('Y-m-d H:i:s'),
        'dtmLastUpdated' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
