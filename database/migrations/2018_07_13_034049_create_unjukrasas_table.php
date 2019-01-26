<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnjukrasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unjukrasas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('jmlKasus');
          $table->integer('jmlPolitik');
          $table->integer('jmlEkonomi');
          $table->integer('jmlAgama');
          $table->integer('jmlLainnya');
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
        Schema::dropIfExists('unjukrasas');
    }
}
