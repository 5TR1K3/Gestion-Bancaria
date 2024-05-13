<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nombre_Usuario' => $this->faker->nombreUsuario(),
            'DUI_Persona' => $this->faker->duiPersona(),
            'Sueldo' => $this->faker->sueldo(),
            'Contrasenia' => $this->faker->contrasenia(),
            'Verificado' => $this->faker->verificado(),
            'EstadoUsuario' => $this->faker->estadoUsuario(),
            'ID_Sucursal' => $this->faker->idSucursal(),
        ];
    }
}
