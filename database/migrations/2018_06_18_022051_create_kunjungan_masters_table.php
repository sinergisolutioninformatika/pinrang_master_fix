<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKunjunganMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjunganMasters', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('totalKunjungan');
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
        Schema::dropIfExists('kunjunganMasters');
    }
}
