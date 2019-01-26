<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruPNSMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guruPNSMasters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ta');
            $table->integer('totalGuruPNS');
            $table->integer('totalGuruTKPNS');
            $table->integer('totalGuruSDPNS');
            $table->integer('totalGuruSMPPNS');
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
        Schema::dropIfExists('guru_p_n_s_masters');
    }
}
