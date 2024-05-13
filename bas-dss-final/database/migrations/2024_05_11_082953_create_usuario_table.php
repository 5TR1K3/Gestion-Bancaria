<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->char('Nombre_Usuario', 20)->primary();
            $table->char('DUI_Persona', 9);
            $table->decimal('Sueldo', 10, 2);
            $table->string('Contrasenia', 20);
            $table->enum('Verificado', ['Si', 'No']);
            $table->enum('EstadoUsuario', ['Activo', 'Inactivo']);
            $table->char('ID_Sucursal', 6);
            
            $table->foreign('DUI_Persona', 'fk_Usuario_Persona')->references('DUI')->on('personas');
            $table->foreign('ID_Sucursal', 'fk_Usuario_Sucursal')->references('ID')->on('sucursals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
