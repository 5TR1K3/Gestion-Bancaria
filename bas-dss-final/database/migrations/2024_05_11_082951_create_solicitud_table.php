<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->integer('ID')->primary();
            $table->string('Asunto', 50);
            $table->text('Contenido');
            $table->text('ArgumentoDenegado')->nullable();
            $table->dateTime('FechaAprobacionRechazo')->nullable();
            $table->integer('ID_Empleado');
            
            $table->foreign('ID_Empleado', 'fk_Solicitud_Empleado')->references('ID')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
}
