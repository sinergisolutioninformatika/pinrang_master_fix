<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLakalantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lakalantas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('jmlKejadian');
          $table->integer('Meninggal');
          $table->integer('Lukaberat');
          $table->integer('Lukaringan');
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
        Schema::dropIfExists('lakalantas');
    }
}
