<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIkanasinDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikanasinDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ikanasinMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlProduksi');
          $table->integer('jmlLaut');
          $table->integer('jmlDarat');
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
        Schema::dropIfExists('ikanasinDetails');
    }
}
