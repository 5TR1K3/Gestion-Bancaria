<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->char('DUI', 9)->primary();
            $table->string('PrimerNombre', 25);
            $table->string('SegundoNombre', 25);
            $table->string('PrimerApellido', 25);
            $table->string('SegundoApellido', 25);
            $table->date('Fechanac');
            $table->char('telefono', 8);
            $table->string('Correo', 80);
            $table->string('Direccion', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
