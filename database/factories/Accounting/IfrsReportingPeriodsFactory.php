<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\IfrsReportingPeriods;
use Illuminate\Database\Eloquent\Factories\Factory;

class IfrsReportingPeriodsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IfrsReportingPeriods::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entity_id' => $this->faker->word,
        'period_count' => $this->faker->numberBetween(0, 999),
        'status' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'calendar_year' => $this->faker->date('Y-m-d'),
        'destroyed_at' => $this->faker->date('Y-m-d H:i:s'),
        'closing_date' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
