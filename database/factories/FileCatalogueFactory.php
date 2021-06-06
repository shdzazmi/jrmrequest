<?php

namespace Database\Factories;

use App\Models\FileCatalogue;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileCatalogueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FileCatalogue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nama' => $this->faker->word,
        'file_path' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
