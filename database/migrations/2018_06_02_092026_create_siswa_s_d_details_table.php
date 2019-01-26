<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaSDDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswaSDDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswaSDMaster_id');
            $table->integer('kecamatan_id');
            $table->integer('jmlSiswaSD');
            $table->integer('jmlLaki');
            $table->integer('jmlPerempuan');
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
        Schema::dropIfExists('siswa_s_d_details');
    }
}
