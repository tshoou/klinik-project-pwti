<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'tbl_pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = ['id_pegawai', 'nip', 'nama', 'jenis_kelamin', 'alamat', 'email', 'tgl_lahir', 'id_golongan', 'pendidikan', 'foto'];
    public function user()
    {
        return $this->hasMany(User::Class, 'id_pegawai');
    }
    public function dokter()
    {
        return $this->hasMany(JadwalDokter::Class, 'id_pegawai');
    }
    public function rekammedis()
    {
        return $this->hasMany(RekamMedis::Class, 'id_pegawai');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_golongan');
    }
}
