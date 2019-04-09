<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiudadanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudadanos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->string('telefono');
            $table->string('telefono_2');
            $table->string('telefono_3');
            $table->string('direccion');
            $table->unsignedInteger('departamento_id');
            $table->unsignedInteger('municipio_id');
            $table->unsignedInteger('comuna_id');
            $table->unsignedInteger('barrio_id');
            $table->unsignedInteger('puesto_id');
            $table->unsignedInteger('mesa_id');
            $table->text('email');
            $table->unsignedInteger('lider_id');
            $table->boolean('activo');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('ciudadanos');
    }
}
