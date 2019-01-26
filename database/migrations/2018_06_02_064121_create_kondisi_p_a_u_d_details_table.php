<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKondisiPAUDDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kondisiPAUDDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('kondisiPAUDMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlPAUD');
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
        Schema::dropIfExists('kondisi_p_a_u_d_details');
    }
}
