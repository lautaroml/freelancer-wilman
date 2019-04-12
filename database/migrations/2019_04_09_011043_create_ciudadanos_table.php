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
            $table->string('documento');
            $table->string('nombres');
            $table->string('telefono');
            $table->string('telefono_2')->nullable();
            $table->string('telefono_3')->nullable();
            $table->string('direccion');
            $table->unsignedInteger('departamento_id');
            $table->unsignedInteger('municipio_id');
            $table->unsignedInteger('comuna_id');
            $table->unsignedInteger('barrio_id')->nullable();
            $table->unsignedInteger('puesto_id')->nullable();
            $table->unsignedInteger('mesa_id')->nullable();
            $table->text('email')->nullable();
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
