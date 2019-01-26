<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternetDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internetDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('internetMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlDesaterlayani');
          $table->integer('jmlDesabelumterlayani');
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
        Schema::dropIfExists('internetDetails');
    }
}
