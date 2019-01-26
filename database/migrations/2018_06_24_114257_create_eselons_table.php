<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEselonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eselons', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('totalPejabat');
          $table->integer('eselonIIa');
          $table->integer('eselonIIb');
          $table->integer('eselonIIIa');
          $table->integer('eselonIIIb');
          $table->integer('eselonIVa');
          $table->integer('eselonIVb');
          $table->integer('eselonV');
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
        Schema::dropIfExists('eselons');
    }
}
