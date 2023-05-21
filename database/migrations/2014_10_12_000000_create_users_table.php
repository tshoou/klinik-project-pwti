<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_pegawai');
            $table->integer('nip');
            $table->unsignedInteger('id_golongan');
            $table->string('password');
            $table->timestamps();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('tbl_pegawai')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('users');
    }
}
