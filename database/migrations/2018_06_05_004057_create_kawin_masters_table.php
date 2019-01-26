<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKawinMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kawinMasters', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('bln');
          $table->integer('totalKawin');
          $table->integer('totalCerai');
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
        Schema::dropIfExists('kawin_masters');
    }
}
