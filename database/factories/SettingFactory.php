<?php

namespace Database\Factories\Base;

use App\Models\Base\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'description' => $this->faker->text($this->faker->numberBetween(5, 100)),
        'value' => $this->faker->text($this->faker->numberBetween(5, 50))
        ];
    }
}
