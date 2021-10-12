<?php

namespace Database\Factories\Accounting;

use App\Models\Accounting\IfrsCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class IfrsCategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IfrsCategories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entity_id' => $this->faker->word,
        'category_type' => $this->faker->text($this->faker->numberBetween(5, 4096)),
        'name' => $this->faker->text($this->faker->numberBetween(5, 300)),
        'destroyed_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
