<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApbdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apbds', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('jmlPendapatan');
          $table->integer('jmlPAD');
          $table->integer('jmlDanaperimbangan');
          $table->integer('jmlPendapatanlain');
          $table->integer('jmlBelanja');
          $table->integer('jmlBelanjatidaklangsung');
          $table->integer('jmlBelanjalangsung');
          $table->integer('jmlPembiayaan');
          $table->integer('jmlPembiayaanpenerimaan');
          $table->integer('jmlPembiayaanpengeluaran');
          $table->integer('jmlSilpa');
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
        Schema::dropIfExists('apbds');
    }
}
