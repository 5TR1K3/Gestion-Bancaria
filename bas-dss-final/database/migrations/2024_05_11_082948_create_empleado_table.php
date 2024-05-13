<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->integer('ID')->primary();
            $table->char('DUI_Persona', 9);
            $table->string('Contrasenia', 20);
            $table->integer('ID_Rol');
            $table->enum('Estado', ['Activo', 'Inactivo']);
            $table->char('ID_Sucursal', 6);
            
            $table->foreign('DUI_Persona', 'fk_Empleado_Persona')->references('DUI')->on('personas');
            $table->foreign('ID_Rol', 'fk_Empleado_Rol')->references('ID')->on('rols');
            $table->foreign('ID_Sucursal', 'fk_Empleado_Sucursal')->references('ID')->on('sucursals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
