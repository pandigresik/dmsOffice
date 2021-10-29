<?php

namespace Database\Factories\Base;

use App\Models\Base\DmsArCustomerrouteinfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class DmsArCustomerrouteinfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DmsArCustomerrouteinfo::class;

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
        'intItemNumber' => $this->faker->numberBetween(0, 999),
        'szRouteType' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'szEmployeeId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'bMon' => $this->faker->boolean,
        'bTue' => $this->faker->boolean,
        'bWed' => $this->faker->boolean,
        'bThu' => $this->faker->boolean,
        'bFri' => $this->faker->boolean,
        'bSat' => $this->faker->boolean,
        'bSun' => $this->faker->boolean,
        'bWeek1' => $this->faker->boolean,
        'bWeek2' => $this->faker->boolean,
        'bWeek3' => $this->faker->boolean,
        'bWeek4' => $this->faker->boolean,
        'szUserCreatedId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'szUserUpdatedId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'dtmCreated' => $this->faker->date('Y-m-d H:i:s'),
        'dtmLastUpdated' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
