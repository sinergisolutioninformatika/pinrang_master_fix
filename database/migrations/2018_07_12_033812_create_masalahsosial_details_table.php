<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasalahsosialDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masalahsosialDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('masalahsosialMaster_id');
          $table->integer('masalahsosial_id');
          $table->integer('jmlMasalah');
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
        Schema::dropIfExists('masalahsosialDetails');
    }
}
