<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rol>
 */
class RolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ID' => $this->faker->id(),
            'Rol' => $this->faker->rol(),
            'Abreviatura' => $this->faker->abreviatura(),
            'Descripcion' => $this->faker->descripcion(),
        ];
    }
}
