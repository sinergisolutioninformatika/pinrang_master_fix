<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('posMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlPos');
          $table->integer('jmlPospembantu');
          $table->integer('jmlDesaterlayani');
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
        Schema::dropIfExists('posDetails');
    }
}
