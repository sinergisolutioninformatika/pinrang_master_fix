<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaipendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawaipendidikans', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('jmlSD');
          $table->integer('jmlSMP');
          $table->integer('jmlSMA');
          $table->integer('jmlD1');
          $table->integer('jmlD2');
          $table->integer('jmlD3');
          $table->integer('jmlS1');
          $table->integer('jmlS2');
          $table->integer('jmlS3');
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
        Schema::dropIfExists('pegawaipendidikans');
    }
}
