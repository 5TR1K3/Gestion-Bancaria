<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentabancariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_bancarias', function (Blueprint $table) {
            $table->char('ID_Cuenta', 9)->primary();
            $table->char('DUI_Persona', 9)->nullable();
            $table->decimal('Saldo', 10, 2)->nullable();
            $table->enum('Estado_cuenta', ['Activa', 'Inactiva']);
            
            $table->foreign('DUI_Persona', 'fk_CuentaBancaria_Usuario')->references('DUI')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas_bancarias');
    }
}
