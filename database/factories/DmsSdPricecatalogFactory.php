<?php

namespace Database\Factories\Sales;

use App\Models\Sales\DmsSdPricecatalog;
use Illuminate\Database\Eloquent\Factories\Factory;

class DmsSdPricecatalogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DmsSdPricecatalog::class;

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
        'szCombinationId' => $this->faker->text($this->faker->numberBetween(5, 100)),
        'szCompanyId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'dtmValidFrom' => $this->faker->date('Y-m-d H:i:s'),
        'dtmValidTo' => $this->faker->date('Y-m-d H:i:s'),
        'intPriority' => $this->faker->numberBetween(0, 999),
        'szUserCreatedId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'szUserUpdatedId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'dtmCreated' => $this->faker->date('Y-m-d H:i:s'),
        'dtmLastUpdated' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
