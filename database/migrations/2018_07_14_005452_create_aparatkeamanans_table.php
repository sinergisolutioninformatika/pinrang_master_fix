<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAparatkeamanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aparatkeamanans', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('jmlAparat');
          $table->integer('jmlSatpol');
          $table->integer('jmlLinmas');
          $table->integer('jmlPatroli');
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
        Schema::dropIfExists('aparatkeamanans');
    }
}
