<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKoperasiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koperasiDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('koperasiMaster_id');
          $table->integer('koperasi_id');
          $table->integer('jmlKoperasi');
          $table->integer('jmlAktif');
          $table->integer('jmlTidakaktif');
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
        Schema::dropIfExists('koperasiDetails');
    }
}
