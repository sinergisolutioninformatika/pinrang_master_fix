<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNakerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nakerDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('nakerMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlPerusahaan');
          $table->integer('jmlNaker');
          $table->integer('jmlNakerlaki');
          $table->integer('jmlNakerperempuan');
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
        Schema::dropIfExists('naker_details');
    }
}
