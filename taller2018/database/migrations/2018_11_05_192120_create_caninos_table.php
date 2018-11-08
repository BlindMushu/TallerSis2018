<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaninosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caninos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->string('nombre',25);
            $table->string('foto',50);
            $table->string('raza',25);
            $table->date('nacimiento');
            $table->boolean('genero');
            $table->boolean('agresivo');
            $table->decimal('peso',10,5);
            $table->text('tipo_comida');
            $table->text('extras');
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
        Schema::dropIfExists('caninos');
    }
}
