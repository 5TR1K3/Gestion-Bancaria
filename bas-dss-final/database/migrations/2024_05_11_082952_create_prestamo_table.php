<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->integer('ID')->primary();
            $table->char('DUI_Persona', 9);
            $table->decimal('Monto', 10, 2);
            $table->decimal('TasaInteres', 10, 2);
            $table->string('Estado', 25);
            $table->dateTime('FechaSolicitud');
            $table->decimal('CuotaMensual', 10, 2);
            $table->date('PlazoPago');
            $table->integer('ID_Solicitud');
            
            $table->foreign('ID_Solicitud', 'fk_Prestamo_Solicitud')->references('ID')->on('solicituds');
            $table->foreign('DUI_Persona', 'fk_Prestamo_Usuario')->references('DUI')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
