<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTKDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswaTKDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('siswaTKMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlSiswaTK');
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
        Schema::dropIfExists('siswa_t_k_details');
    }
}
