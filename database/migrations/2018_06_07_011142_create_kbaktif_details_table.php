<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKbaktifDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kbaktifDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('kbaktifMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlPPMKab');
          $table->integer('jmlPPMProv');
          $table->integer('jmlPPMPusat');
          $table->integer('jmlIUD');
          $table->integer('jmlMOP');
          $table->integer('jmlMOW');
          $table->integer('jmlIMP');
          $table->integer('jmlSTK');
          $table->integer('jmlPIL');
          $table->integer('jmlKDM');
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
        Schema::dropIfExists('kbaktif_details');
    }
}
