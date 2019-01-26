<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerbitanizinDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerbitanizinDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('penerbitanizinMaster_id');
          $table->integer('bidang_izin_id');
          $table->integer('jmlPenerbitan');
          $table->integer('jmlRetribusi');
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
        Schema::dropIfExists('penerbitanizin_details');
    }
}
