<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruPNSDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guruPNSDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('guruPNSMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlGuruPNS');
          $table->integer('jmlGuruTKPNS');
          $table->integer('jmlGuruSDPNS');
          $table->integer('jmlGuruSMPPNS');
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
        Schema::dropIfExists('guru_p_n_s_details');
    }
}
