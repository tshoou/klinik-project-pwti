<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'tbl_pasien';
    protected $primaryKey = 'id_pasien';
    protected $fillable = ['nama_pasien', 'tgl_lahir', 'jenis_kelamin', 'no_telfon', 'gol_darah', 'status_nikah', 'alamat'];
    public function rekammedis()
    {
        return $this->hasMany(RekamMedis::Class);
    }
}
