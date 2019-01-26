<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadiMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padiMasters', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ta');
          $table->integer('totalTanam');
          $table->integer('totalPanen');
          $table->integer('totalProduksi');
          $table->integer('totalProduktivitas');
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
        Schema::dropIfExists('padi_masters');
    }
}
