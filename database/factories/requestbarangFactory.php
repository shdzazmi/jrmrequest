<?php

namespace Database\Factories;

use App\Models\requestbarang;
use Illuminate\Database\Eloquent\Factories\Factory;

class requestbarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = requestbarang::class;

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
            'kendaraan' => $this->faker->word,
            'partno1' => $this->faker->word,
            'keterangan' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
