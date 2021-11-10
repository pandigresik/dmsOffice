<?php

namespace Database\Factories\Base;

use App\Models\Base\DmsSmBranch;
use Illuminate\Database\Eloquent\Factories\Factory;

class DmsSmBranchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DmsSmBranch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'szId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szName' => $this->faker->lastName,
        'szDescription' => $this->faker->text($this->faker->numberBetween(5, 200)),
        'szCompanyId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'szLangitude' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szLongitude' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szTaxEntityId' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'szProvince' => $this->faker->text($this->faker->numberBetween(5, 5000)),
        'szCity' => $this->faker->text($this->faker->numberBetween(5, 5000)),
        'szDistrict' => $this->faker->text($this->faker->numberBetween(5, 5000)),
        'szSubDistrict' => $this->faker->text($this->faker->numberBetween(5, 5000)),
        'szUserCreatedId' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'szUserUpdatedId' => $this->faker->text($this->faker->numberBetween(5, 20))
        ];
    }
}
