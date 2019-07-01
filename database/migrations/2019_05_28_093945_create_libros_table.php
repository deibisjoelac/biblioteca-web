<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('categoria');
			$table->text('nombre');
			$table->text('autor');
			$table->text('editorial');
			$table->integer('numero_paginas')->default(1);
            $table->integer('stock')->default(1);
            $table->string('portada')->nullable();
            $table->string('libro_pdf')->nullable();
			$table->text('descripcion_corta')->nullable();
            $table->integer('estado')->default(1);
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
        Schema::dropIfExists('libros');
    }
}
