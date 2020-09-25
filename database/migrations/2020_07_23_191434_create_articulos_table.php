<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_articulos', function(Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('categoria_statuses', function(Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('abstract');
            $table->string('archivo');
            $table->foreignId('categoria_id') -> references('id') -> on('categoria_articulos') -> comment('Categoria de la receta');
            $table->foreignId('status_id') -> references('id') -> on('categoria_statuses') -> comment('Status del articulo');
            $table->foreignId('user_id') -> references('id') -> on('users') -> comment('El autor que crea el articulo');
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
        Schema::dropIfExists('articulos');
        Schema::dropIfExists('categoria_articulos');
        Schema::dropIfExists('categoria_statuses');
    }
}
