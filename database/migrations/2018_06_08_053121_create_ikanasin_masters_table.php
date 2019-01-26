<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIkanasinMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikanasinMasters', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('totalProduksi');
          $table->integer('totalLaut');
          $table->integer('totalDarat');
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
        Schema::dropIfExists('ikanasinMasters');
    }
}
