<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('firma_id');
            $table->integer('empresa_id');
            $table->integer('provider_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->string('num_fact')->nullable();
            $table->string('num_control')->nullable();
            $table->string('transaccion');
            $table->date('fecha_fact');
            $table->date('fecha_apli_compra')->nullable();
            $table->decimal('monto');
            $table->decimal('iva');
            $table->decimal('exento')->nullable();
            $table->decimal('monto_total');
            $table->string('cod_retencion')->nullable();
            $table->decimal('monto_retencion')->nullable();
            $table->date('fecha_apli_retencion')->nullable();
            $table->string('cod_ncredito')->nullable();
            $table->string('cod_ndebito')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
