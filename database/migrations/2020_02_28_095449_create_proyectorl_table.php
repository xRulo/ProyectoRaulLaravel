<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectorlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrumentosrl', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('tipo');
            $table->double('precio');
            $table->integer('cantidad');
            $table->string('color');
            $table->string('marca');
            $table->string('estado');
            $table->string('descripcion');
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
        Schema::dropIfExists('instrumentosrl');
    }
}
