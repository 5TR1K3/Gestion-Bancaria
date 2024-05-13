<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosbancariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_bancarios', function (Blueprint $table) {
            $table->char('ID', 8)->primary();
            $table->integer('ID_Tipo');
            $table->char('ID_cuenta_origen', 9)->nullable();
            $table->char('ID_cuenta_destino', 9)->nullable();
            $table->dateTime('Fecha');
            $table->decimal('Monto', 10, 2);
            $table->integer('ID_Empleado');
            
            $table->foreign('ID_cuenta_destino', 'fk_MovimientosBancarios_CuentaBancaria_Destino')->references('ID_Cuenta')->on('cuentas_bancarias');
            $table->foreign('ID_cuenta_origen', 'fk_MovimientosBancarios_CuentaBancaria_Origen')->references('ID_Cuenta')->on('cuentas_bancarias');
            $table->foreign('ID_Empleado', 'fk_MovimientosBancarios_Empleado')->references('ID')->on('empleados');
            $table->foreign('ID_Tipo', 'fk_MovimientosBancarios_TipoTransaccion')->references('ID')->on('tipo_transaccions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimiento_bancarios');
    }
}
