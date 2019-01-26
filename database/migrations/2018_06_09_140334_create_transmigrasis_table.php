<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransmigrasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transmigrasis', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('Jumlah');
          $table->integer('Lakilaki');
          $table->integer('Perempuan');
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
        Schema::dropIfExists('transmigrasis');
    }
}
