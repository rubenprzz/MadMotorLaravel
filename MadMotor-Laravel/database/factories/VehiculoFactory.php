<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehiculo>
 */
class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'marca' => $this->faker->word,
            'modelo' => $this->faker->word,
            'year' => $this->faker->year,
            'km' => $this->faker->randomNumber(5),
            'precio' => $this->faker->randomFloat(2, 1000, 100000),
            'cantidad' => $this->faker->randomNumber(2),
            'imagen' => $this->faker->imageUrl(),
            'categoria_id' => 1,
            'isDeleted' => false,
        ];
    }
}
