<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKawinDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kawinDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('kawinMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlKawin');
          $table->integer('jmlCerai');
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
        Schema::dropIfExists('kawin_details');
    }
}
