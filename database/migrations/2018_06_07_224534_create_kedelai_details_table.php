<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKedelaiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kedelaiDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('kedelaiMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlTanam');
          $table->integer('jmlPanen');
          $table->integer('jmlProduksi');
          $table->integer('jmlProduktivitas');
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
        Schema::dropIfExists('kedelai_details');
    }
}
