<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTernakAyamraspedagingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ternak_ayamraspedagings', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('Populasi');
          $table->integer('Kematian');
          $table->integer('Kelahiran');
          $table->integer('Masuk');
          $table->integer('Keluar');
          $table->integer('RPH');
          $table->integer('NonRPH');
          $table->integer('jmlPotong');
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
        Schema::dropIfExists('ternak_ayamraspedagings');
    }
}
