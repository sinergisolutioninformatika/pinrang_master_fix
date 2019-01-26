<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKondisiSDMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kondisiSDMasters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ta');
            $table->integer('totalSD');
            $table->integer('totalKondisiBaik');
            $table->integer('totalRusakRingan');
            $table->integer('totalRusakBerat');
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
        Schema::dropIfExists('kondisi_s_d_masters');
    }
}
