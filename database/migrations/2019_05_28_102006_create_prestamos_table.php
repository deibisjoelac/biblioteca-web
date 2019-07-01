<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('alumno_id');
			$table->unsignedBigInteger('libro_id');
			$table->date('fecha_inicio');
			$table->date('fecha_fin');
			$table->date('fecha_devolucion')->nullable();
			$table->integer('estado')->default(1);
			$table->text('descripcion')->nullable();
			$table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('alumno_id')->references('id')->on('alumnos');
			$table->foreign('libro_id')->references('id')->on('libros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
