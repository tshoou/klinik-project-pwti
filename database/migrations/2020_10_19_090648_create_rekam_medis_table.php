<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->increments('id_rekam_medis');
            $table->unsignedInteger('id_pasien');
            $table->text('keluhan')->nullable();
            $table->text('diagnosa')->nullable();
            $table->unsignedInteger('id_dokter');
            $table->string('keterangan_masuk', 75);
            $table->date('tgl_masuk');
            $table->date('tgl_keluar')->nullable();
            $table->string('ket_proses', 24);
            $table->unsignedInteger('id_kasir')->nullable();
            $table->integer('total_pembayaran')->nullable();
            $table->timestamps();
            $table->foreign('id_pasien')->references('id_pasien')->on('tbl_pasien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_dokter')->references('id_dokter')->on('tbl_dokter')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kasir')->references('id_pegawai')->on('tbl_pegawai')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekam_medis');
    }
}
