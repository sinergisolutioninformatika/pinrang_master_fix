<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendudukDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendudukDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('pendudukMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlPenduduk');
          $table->integer('jmlPendLaki');
          $table->integer('jmlPendPerempuan');
          $table->integer('jmlWKTP');
          $table->integer('jmlWKTPLaki');
          $table->integer('jmlWKTPPerempuan');
          $table->integer('jmlCetak');
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
        Schema::dropIfExists('penduduk_details');
    }
}
