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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('nif',9)->unique()->nullable();
            $table->string('direccion')->nullable();
            $table->integer('telefono')->nullable();
            $table->boolean('is_admin')->default(0); /* Tipo de usuario: Cliente(0)/Administrador(1) (Cuenta Cliente por defecto) */
            $table->boolean('activo')->default(0);  /*Indica si la cuenta del usuario está Inactiva(0)/Activa(1) (Cuenta Inactiva por defecto)*/
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
        Schema::dropIfExists('users');
    }
};
