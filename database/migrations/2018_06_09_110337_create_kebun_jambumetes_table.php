<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKebunJambumetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kebun_jambumetes', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('Areal');
          $table->integer('Petani');
          $table->integer('Produksi');
          $table->integer('Produktivitas');
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
        Schema::dropIfExists('kebun_jambumetes');
    }
}
