<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaSMPDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswaSMPDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('siswaSMPMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlSiswaSMP');
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
        Schema::dropIfExists('siswa_s_m_p_details');
    }
}
