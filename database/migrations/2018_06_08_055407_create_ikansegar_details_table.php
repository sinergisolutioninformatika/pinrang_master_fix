<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIkansegarDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikansegarDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ikansegarMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlProduksi');
          $table->integer('jmlTambak');
          $table->integer('jmlKolam');
          $table->integer('jmlSawah');
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
        Schema::dropIfExists('ikansegarDetails');
    }
}
