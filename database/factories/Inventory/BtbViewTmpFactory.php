<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\BtbViewTmp;
use Illuminate\Database\Eloquent\Factories\Factory;

class BtbViewTmpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BtbViewTmp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Tgl_BTB' => $this->faker->text($this->faker->numberBetween(5, 10)),
        'No_BTB' => $this->faker->text($this->faker->numberBetween(5, 11)),
        'ID_Vendor' => $this->faker->word,
        'Nama_Vendor' => $this->faker->text($this->faker->numberBetween(5, 20)),
        'Nama_PT' => $this->faker->lexify('?????'),
        'No_CO' => $this->faker->word,
        'No_DN' => $this->faker->word,
        'Tgl_sjp' => $this->faker->text($this->faker->numberBetween(5, 10)),
        'Depo' => $this->faker->text($this->faker->numberBetween(5, 8)),
        'Nama_Produk' => $this->faker->text($this->faker->numberBetween(5, 5))
        ];
    }
}
