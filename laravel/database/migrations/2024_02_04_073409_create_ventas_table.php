<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_camiseta');
            $table->unsignedBigInteger('id_user');
            $table->string('estado'); /* (En preparación / Enviado / Recibido) */
            $table->double('precio_venta'); /* Precio en el momento de la venta */
            $table->integer('descuento_venta'); /* Descuento aplicado en el momento de la venta */
            $table->timestamps(); /* Fecha de la venta (momento en el que se compró la camiseta) */
            /* LOS ÍNDICES SÓLO HAY QUE CREARLOS PARA CAMPOS DE TEXTO (LOS 'ID' SE CREAN SÓLOS Y NOS DARÍA FALLO POR DUPLICADO DE ÍNDICE) */
            /*table->index('id_camiseta'); Preparamos los campos índice para poder establecer relaciones */
            /*$table->index('id_camiseta'); Preparamos los campos índice para poder establecer relaciones */
            $table->foreign('id_camiseta')->references('id')->on('camisetas'); /* Referenciamos las claves ajenas para relacionar tablas */
            $table->foreign('id_user')->references('id')->on('users'); /* Referenciamos las claves ajenas para relacionar tablas */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
