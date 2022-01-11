<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\ReportSettingAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportSettingAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReportSettingAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'group_type' => $this->faker->text($this->faker->numberBetween(5, 20))
        ];
    }
}
