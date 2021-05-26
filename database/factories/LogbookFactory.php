<?php

namespace Database\Factories;

use App\Models\Logbook;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogbookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Logbook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_karyawan' => $this->faker->word,
        'nama' => $this->faker->word,
        'waktu' => $this->faker->word,
        'status' => $this->faker->word,
        'keterangan' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
