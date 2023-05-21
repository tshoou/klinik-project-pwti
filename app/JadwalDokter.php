<?php

namespace App;

use App\Pegawai;

use Illuminate\Database\Eloquent\Model;

class JadwalDokter extends Model
{
    protected $table = 'tbl_dokter';
    protected $primaryKey = 'id_dokter';
    protected $fillable = ['id_pegawai', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu', 'biaya_jasa'];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::Class, 'id_pegawai');
    }
    public function rekammedis()
    {
        return $this->hasMany(RekamMedis::Class, 'id_dokter');
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::Class, 'id_pegawai');
    // }
}
