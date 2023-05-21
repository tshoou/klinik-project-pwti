<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    //
    protected $table = 'tbl_dokter';
    protected $primaryKey = 'id_dokter';
    protected $fillable =['id_dokter','id_pegawai','senin','selasa','rabu','kamis','jumat','sabtu','minggu'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::Class, 'id_pegawai');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_golongan');
    }
}
