<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruSertifikatDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guruSertifikatDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('guruSertifikatMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlGuruSertifikat');
          $table->integer('jmlGuruTKSertifikat');
          $table->integer('jmlGuruSDSertifikat');
          $table->integer('jmlGuruSMPSertifikat');
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
        Schema::dropIfExists('guru_sertifikat_details');
    }
}
