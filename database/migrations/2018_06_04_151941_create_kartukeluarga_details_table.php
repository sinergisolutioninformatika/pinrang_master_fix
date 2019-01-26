<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartukeluargaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartukeluargaDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kartukeluargaMaster_id');
            $table->integer('kecamatan_id');
            $table->integer('jmlKK');
            $table->integer('jmlMilikiKK');
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
        Schema::dropIfExists('kartukeluarga_details');
    }
}
