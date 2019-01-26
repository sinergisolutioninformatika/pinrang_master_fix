<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuassawahDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luassawahDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('luassawahMaster_id');
          $table->integer('jmlPetak');
          $table->integer('jmlLuas');
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
        Schema::dropIfExists('luassawah_details');
    }
}
