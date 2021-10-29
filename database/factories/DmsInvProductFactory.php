<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\DmsInvProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class DmsInvProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DmsInvProduct::class;

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
        'szDescription' => $this->faker->text($this->faker->numberBetween(5, 1000)),
        'szTrackingType' => $this->faker->text($this->faker->numberBetween(5, 10)),
        'szUomId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'bUseComposite' => $this->faker->boolean,
        'bKit' => $this->faker->boolean,
        'szQtyFormat' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szProductType' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szNickName' => $this->faker->lastName,
        'dtmStartDate' => $this->faker->date('Y-m-d H:i:s'),
        'dtmEndDate' => $this->faker->date('Y-m-d H:i:s'),
        'szUserCreatedId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'szUserUpdatedId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'dtmCreated' => $this->faker->date('Y-m-d H:i:s'),
        'dtmLastUpdated' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
