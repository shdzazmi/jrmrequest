<?php

namespace Database\Factories;

use App\Models\Logbook_barang;
use Illuminate\Database\Eloquent\Factories\Factory;

class Logbook_barangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Logbook_barang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tanggal' => $this->faker->word,
        'nama' => $this->faker->word,
        'driver' => $this->faker->word,
        'plat' => $this->faker->word,
        'tujuan' => $this->faker->word,
        'barcode' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
