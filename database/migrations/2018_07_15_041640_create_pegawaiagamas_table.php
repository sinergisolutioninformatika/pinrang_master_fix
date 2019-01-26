<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiagamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawaiagamas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('jmlIslam');
          $table->integer('jmlKatolik');
          $table->integer('jmlProtestan');
          $table->integer('jmlBudha');
          $table->integer('jmlHindu');
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
        Schema::dropIfExists('pegawaiagamas');
    }
}
