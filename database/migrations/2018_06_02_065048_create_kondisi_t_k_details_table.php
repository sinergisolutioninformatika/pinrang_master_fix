<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKondisiTKDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kondisiTKDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('kondisiTKMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlTK');
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
        Schema::dropIfExists('kondisi_t_k_details');
    }
}
