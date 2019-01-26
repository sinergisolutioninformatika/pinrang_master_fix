<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBencanaalamDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bencanaalamDetails', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('bencanaalamMaster_id');
          $table->integer('kecamatan_id');
          $table->integer('jmlKejadian');
          $table->integer('jmlBanjir');
          $table->integer('jmlKebakaran');
          $table->integer('jmlKekeringan');
          $table->integer('jmlAnginkencang');
          $table->integer('jmlTanahlongsor');
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
        Schema::dropIfExists('bencanaalamDetails');
    }
}
