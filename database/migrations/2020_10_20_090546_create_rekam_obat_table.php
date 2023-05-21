<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_obat', function (Blueprint $table) {
            $table->increments('id_rekam_obat');
            $table->unsignedInteger('id_rekam_medis');
            $table->unsignedInteger('id_obat');
            $table->timestamps();
            $table->foreign('id_rekam_medis')->references('id_rekam_medis')->on('rekam_medis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_obat')->references('id_obat')->on('tbl_obat')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekam_obat');
    }
}
