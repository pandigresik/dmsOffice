<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\DmsInvProductkitinfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class DmsInvProductkitinfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DmsInvProductkitinfo::class;

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
        'szProductId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'decQty' => $this->faker->numberBetween(0, 9223372036854775807),
        'szUomId' => $this->faker->text($this->faker->numberBetween(5, 50))
        ];
    }
}
