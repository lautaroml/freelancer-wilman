<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('liders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->unsignedInteger('departamento_id');
            $table->unsignedInteger('municipio_id');
            $table->unsignedInteger('comuna_id');
            $table->unsignedInteger('barrio_id');
            $table->string('email');
            $table->string('telefono');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('liders');
    }
}
