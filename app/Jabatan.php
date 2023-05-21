<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'tbl_jabatan';
    protected $primaryKey = 'id_golongan';
    protected $fillable = ['nama_jabatan'];
    public function user()
    {
        return $this->hasMany(User::Class);
    }
    public function pegawai()
    {
        return $this->hasMany(Pegawai::Class);
    }
    public function dokter()
    {
        return $this->hasMany(Dokter::Class);
    }
    
}
