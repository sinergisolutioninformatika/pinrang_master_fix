<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemukimanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemukimanDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('pemukimanMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlLuas');
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
        Schema::dropIfExists('pemukimanDetails');
    }
}
