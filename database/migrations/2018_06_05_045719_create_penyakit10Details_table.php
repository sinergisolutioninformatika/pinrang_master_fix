<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyakit10DetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyakit10Details', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('penyakit10Master_id');
          $table->integer('puskesmas_id');
          $table->integer('penyakit_id');
          $table->integer('jmlKasus');
          $table->integer('jmlRawatJalan');
          $table->integer('jmlRawatInap');
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
        Schema::dropIfExists('penyakit10_details');
    }
}
