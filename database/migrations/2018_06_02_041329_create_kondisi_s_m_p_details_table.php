<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKondisiSMPDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kondisiSMPDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('kondisiSMPMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlSMP');
          $table->integer('jmlKondisiBaik');
          $table->integer('jmlRusakRingan');
          $table->integer('jmlRusakBerat');
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
        Schema::dropIfExists('kondisi_s_m_p_details');
    }
}
