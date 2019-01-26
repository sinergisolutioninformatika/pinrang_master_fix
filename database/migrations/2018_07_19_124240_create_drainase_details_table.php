<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrainaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drainaseDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('drainaseMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlUnit');
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
        Schema::dropIfExists('drainaseDetails');
    }
}
