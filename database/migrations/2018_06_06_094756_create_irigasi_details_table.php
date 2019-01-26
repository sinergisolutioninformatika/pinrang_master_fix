<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIrigasiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irigasiDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('irigasiMaster_id');
            $table->integer('uptd_psda_id');
            $table->integer('jmlTersier');
            $table->integer('jmlSekunder');
            $table->integer('jmlInduk');
            $table->integer('jmlKuarter');
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
        Schema::dropIfExists('irigasi_details');
    }
}
