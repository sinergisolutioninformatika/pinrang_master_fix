<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelekomunikasiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telekomunikasiDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('telekomunikasiMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlDesaterlayani');
          $table->integer('jmlDesabelumterlayani');
          $table->integer('jmlBTS');
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
        Schema::dropIfExists('telekomunikasiDetails');
    }
}
