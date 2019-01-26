<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaranakeamanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saranakeamanans', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('jmlSarana');
          $table->integer('jmlPoskeamanan');
          $table->integer('jmlPoskamling');
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
        Schema::dropIfExists('saranakeamanans');
    }
}
