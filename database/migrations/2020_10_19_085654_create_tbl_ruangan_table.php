<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ruangan', function (Blueprint $table) {
            $table->increments('id_ruang');
            $table->unsignedInteger('id_gedung');
            $table->string('nama_ruang', 75);
            $table->text('keterangan_fr');
            $table->timestamps();
            $table->foreign('id_gedung')->references('id_gedung')->on('tbl_gedung')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_ruangan');
    }
}
