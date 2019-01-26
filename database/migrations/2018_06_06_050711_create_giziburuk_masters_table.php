<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiziburukMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giziburukMasters', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('bln');
          $table->integer('totalKasus');
          $table->integer('totalPerawatan');
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
        Schema::dropIfExists('giziburuk_masters');
    }
}
