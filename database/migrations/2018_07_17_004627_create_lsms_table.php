<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lsms', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('jmlLSM');
          $table->integer('jmlLokalterdaftar');
          $table->integer('jmlLokaltidakterdaftar');
          $table->integer('jmlNasionalterdaftar');
          $table->integer('jmlNasionaltidakterdaftar');
          $table->integer('jmlInterterdaftar');
          $table->integer('jmlIntertidakterdaftar');
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
        Schema::dropIfExists('lsms');
    }
}
