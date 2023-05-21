<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pegawai', function (Blueprint $table) {
            $table->integer('id_pegawai')->unsigned();
            $table->primary('id_pegawai');
            $table->integer('nip');
            $table->string('nama', 75);
            $table->string('jenis_kelamin', 11)->nullable();
            $table->text('alamat')->nullable();
            $table->string('email', 75)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->unsignedInteger('id_golongan');
            $table->string('pendidikan', 75)->nullable();
            $table->text('foto')->nullable();
            $table->timestamps();
            $table->foreign('id_golongan')->references('id_golongan')->on('tbl_jabatan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pegawai');
    }
}
