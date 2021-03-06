<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('descripcion_id')->nullable();
            $table->integer('experiencia_id')->nullable();
            //$table->integer('sucursal_id')->nullable();
            $table->string('name',25);
            $table->string('apellido',25);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tipo_usuario',25);
            $table->string('departamento',25);
            $table->string('zona',25);
            $table->string('calle',25);
            $table->string('numero_puerta',25);
            $table->string('direccion',100);
            $table->integer('numero_canes')->nullable();
            $table->integer('telefono');
            $table->string('habilitado')->nullable();
            $table->rememberToken();
            $table->integer('tx_usuario_id');
            $table->string('tx_host',25);
            $table->integer('tx_id');
            $table->timestamps();
            $table->softDeletes();
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
}
