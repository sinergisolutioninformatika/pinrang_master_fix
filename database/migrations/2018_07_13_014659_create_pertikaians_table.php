<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePertikaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertikaians', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('jmlKasus');
          $table->integer('jmlEtnis');
          $table->integer('jmlDesa');
          $table->integer('jmlAgama');
          $table->integer('jmlSimpatisan');
          $table->integer('jmlPelajar');
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
        Schema::dropIfExists('pertikaians');
    }
}
