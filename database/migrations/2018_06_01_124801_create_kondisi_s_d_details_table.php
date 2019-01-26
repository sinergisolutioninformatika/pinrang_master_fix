<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKondisiSDDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kondisiSDDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kondisiSDMaster_id');
            $table->integer('kecamatan_id');
            $table->integer('jmlSD');
            $table->integer('jmlKondisiBaik');
            $table->integer('jmlRusakRingan');
            $table->integer('jmlRusakBerat');
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
        Schema::dropIfExists('kondisi_s_d_details');
    }
}
