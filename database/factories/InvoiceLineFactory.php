<?php

namespace Database\Factories\Purchase;

use App\Models\Purchase\InvoiceLine;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InvoiceLine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoice_id' => $this->faker->word,
        'doc_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'reference_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'product_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'product_name' => $this->faker->text($this->faker->numberBetween(5, 70)),
        'uom_id' => $this->faker->text($this->faker->numberBetween(5, 50)),
        'qty' => $this->faker->numberBetween(0, 999),
        'price' => $this->faker->numberBetween(0, 9223372036854775807)
        ];
    }
}
