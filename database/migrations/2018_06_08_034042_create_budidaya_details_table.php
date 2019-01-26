<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudidayaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budidayaDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('budidayaMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlUsaha');
          $table->integer('jmlTambak');
          $table->integer('jmlKolam');
          $table->integer('jmlSawah');
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
        Schema::dropIfExists('budidaya_details');
    }
}
