<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKorbanunjukrasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korbanunjukrasas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('jmlKorban');
          $table->integer('jmlMeninggal');
          $table->integer('jmlLuka');
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
        Schema::dropIfExists('korbanunjukrasas');
    }
}
