<?php

namespace Database\Factories;

use App\Models\ListServiceOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListServiceOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ListServiceOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nourut' => $this->faker->randomDigitNotNull,
        'uid' => $this->faker->word,
        'barcode' => $this->faker->word,
        'harga' => $this->faker->word,
        'qty' => $this->faker->randomDigitNotNull,
        'subtotal' => $this->faker->randomDigitNotNull,
        'discount' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
