<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartukeluargaMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartukeluargaMasters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ta');
            $table->integer('bln');
            $table->integer('totalKK');
            $table->integer('totalMilikiKK');
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
        Schema::dropIfExists('kartukeluarga_masters');
    }
}
