<?php

namespace Database\Factories\Base;

use App\Models\Base\Menus;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 100)),
        'description' => $this->faker->text($this->faker->numberBetween(5, 100)),
        'status' => $this->faker->lexify('?????'),
        'icon' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'route' => $this->faker->text($this->faker->numberBetween(5, 100)),
        'parent_id' => $this->faker->numberBetween(0, 999),
        'seq_number' => $this->faker->boolean
        ];
    }
}
