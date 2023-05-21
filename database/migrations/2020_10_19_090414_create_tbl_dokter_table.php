<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dokter', function (Blueprint $table) {
            $table->increments('id_dokter');
            $table->unsignedInteger('id_pegawai');
            $table->text('senin');
            $table->text('selasa');
            $table->text('rabu');
            $table->text('kamis');
            $table->text('jumat');
            $table->text('sabtu');
            $table->text('minggu');
            $table->integer('biaya_jasa');
            $table->timestamps();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('tbl_pegawai')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_dokter');
    }
}
