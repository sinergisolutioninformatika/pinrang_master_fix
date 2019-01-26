<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiziburukDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giziburukDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('giziburukMaster_id');
          $table->integer('puskesmas_id');
          $table->integer('jmlKasus');
          $table->integer('jmlPerawatan');
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
        Schema::dropIfExists('giziburuk_details');
    }
}
