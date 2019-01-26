<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNelayanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nelayanDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('nelayanMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlNelayan');
          $table->integer('jmlNelayanlaut');
          $table->integer('jmlNelayandarat');
          $table->integer('jmlPetanisawah');
          $table->integer('jmlPetanikolam');
          $table->integer('jmlPetanitambak');
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
        Schema::dropIfExists('nelayanDetails');
    }
}
