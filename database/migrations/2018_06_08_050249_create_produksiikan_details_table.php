<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksiikanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produksiikanDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('produksiikanMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlProduksi');
          $table->integer('jmlLaut');
          $table->integer('jmlRawa');
          $table->integer('jmlSungai');
          $table->integer('jmlWaduk');
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
        Schema::dropIfExists('produksiikanDetails');
    }
}
