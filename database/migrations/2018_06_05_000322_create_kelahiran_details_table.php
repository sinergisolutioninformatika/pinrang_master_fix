<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelahiranDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelahiranDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('kelahiranMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlKelahiran');
          $table->integer('jmlKematian');
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
        Schema::dropIfExists('kelahiran_details');
    }
}
