<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJamkesMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jamkesMasters', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('bln');
          $table->integer('totalPeserta');
          $table->integer('totalLaki');
          $table->integer('totalPerempuan');
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
        Schema::dropIfExists('jamkes_masters');
    }
}
