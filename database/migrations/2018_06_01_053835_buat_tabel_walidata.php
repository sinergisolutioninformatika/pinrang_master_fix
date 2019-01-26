<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelWalidata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walidata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skpd_id');
            $table->string('nmaData');
            $table->integer('kategori_id');
            $table->string('keterangan');
            $table->string('link_view');
            $table->string('link_admin');
            $table->string('tag');
            $table->string('view_count');
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
        Schema::dropIfExists('walidata');
    }
}
