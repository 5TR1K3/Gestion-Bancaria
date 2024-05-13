<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
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
            'DUI_Persona' => $this->faker->duiPersona(),
            'Contrasenia' => $this->faker->contrasenia(),
            'ID_Rol' => $this->faker->idRol(),
            'Estado' => $this->faker->estado(),
            'ID_Sucursal' => $this->faker->idSucursal(),
        ];
    }
}
