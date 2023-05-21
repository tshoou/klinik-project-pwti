<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pasien', function (Blueprint $table) {
            $table->increments('id_pasien');
            $table->string('nama_pasien', 75);
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin', 12);
            $table->string('no_telfon', 25);
            $table->string('gol_darah', 3);
            $table->string('status_nikah', 25);
            $table->text('alamat');
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
        Schema::dropIfExists('tbl_pasien');
    }
}
