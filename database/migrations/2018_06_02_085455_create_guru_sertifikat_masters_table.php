<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruSertifikatMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guruSertifikatMasters', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('totalGuruSertifikat');
          $table->integer('totalGuruTKSertifikat');
          $table->integer('totalGuruSDSertifikat');
          $table->integer('totalGuruSMPSertifikat');
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
        Schema::dropIfExists('guru_sertifikat_masters');
    }
}
