<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendudukMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendudukMasters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ta');
            $table->integer('bln');
            $table->integer('totalPenduduk');
            $table->integer('totalPendLaki');
            $table->integer('totalPendPerempuan');
            $table->integer('totalWKTP');
            $table->integer('totalWKTPLaki');
            $table->integer('totalWKTPPerempuan');
            $table->integer('totalCetak');
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
        Schema::dropIfExists('penduduk_masters');
    }
}
