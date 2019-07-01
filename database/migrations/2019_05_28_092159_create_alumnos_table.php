<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('carrera_id');
			$table->string('documento',15);
			$table->string('nombre');
			$table->string('telefono',11)->nullable();
			$table->string('email')->nullable();
			$table->text('direccion')->nullable();
			$table->boolean('estado')->default(1);
			$table->timestamps();
			
			$table->foreign('carrera_id')->references('id')->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
