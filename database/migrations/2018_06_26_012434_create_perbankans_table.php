<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerbankansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbankans', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('jmlBank');
          $table->integer('BUP');
          $table->integer('BPD');
          $table->integer('BSN');
          $table->integer('BAC');
          $table->integer('BPR');
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
        Schema::dropIfExists('perbankans');
    }
}
