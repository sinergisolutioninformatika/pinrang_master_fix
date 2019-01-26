<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerbitanizinMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerbitanizinMasters', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('bln');
          $table->integer('totalPenerbitan');
          $table->integer('totalRetribusi');
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
        Schema::dropIfExists('penerbitanizin_masters');
    }
}
