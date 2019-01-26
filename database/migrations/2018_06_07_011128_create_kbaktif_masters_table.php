<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKbaktifMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kbaktifMasters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ta');
            $table->integer('totalPPMKab');
            $table->integer('totalPPMProv');
            $table->integer('totalPPMPusat');
            $table->integer('totalIUD');
            $table->integer('totalMOP');
            $table->integer('totalMOW');
            $table->integer('totalIMP');
            $table->integer('totalSTK');
            $table->integer('totalPIL');
            $table->integer('totalKDM');
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
        Schema::dropIfExists('kbaktif_masters');
    }
}
