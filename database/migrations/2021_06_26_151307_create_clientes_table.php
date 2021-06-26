<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('documento')->primary();
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('telefono');
            $table->string('direccion');
            $table->date('fecha_ultima_compra')->nullable();
            $table->unsignedBigInteger('ultimo_evento_id')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
