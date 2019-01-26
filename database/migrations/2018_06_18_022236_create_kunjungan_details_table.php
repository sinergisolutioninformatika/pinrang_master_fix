<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKunjunganDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjunganDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('kunjunganMaster_id');
          $table->integer('lokasiperpustakaan_id');
          $table->integer('jmlKunjungan');
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
        Schema::dropIfExists('kunjunganDetails');
    }
}
