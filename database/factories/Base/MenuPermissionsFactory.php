<?php

namespace Database\Factories\Base;

use App\Models\Base\MenuPermissions;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuPermissionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MenuPermissions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'permission_id' => $this->faker->word,
        'status' => $this->faker->lexify('?????')
        ];
    }
}
