<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaSDMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswaSDMasters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ta');
            $table->integer('totalSiswaSD');
            $table->integer('totalLaki');
            $table->integer('totalPerempuan');
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
        Schema::dropIfExists('siswa_s_d_masters');
    }
}
