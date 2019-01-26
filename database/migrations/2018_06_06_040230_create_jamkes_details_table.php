<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJamkesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jamkesDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('jamkesMaster_id');
          $table->integer('puskesmas_id');
          $table->integer('jmlPeserta');
          $table->integer('jmlLaki');
          $table->integer('jmlPerempuan');
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
        Schema::dropIfExists('jamkes_details');
    }
}
