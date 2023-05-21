<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'id_rekam_medis';
    protected $fillable = ['id_pasien', 'keluhan', 'id_ruang', 'diagnosa', 'id_dokter', 'keterangan_masuk', 'tgl_masuk', 'tgl_keluar', 'ket_proses', 'id_kasir', 'total_pembayaran'];
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
    public function dokter()
    {
        return $this->belongsTo(JadwalDokter::class, 'id_dokter');
    }
    public function kasir()
    {
        return $this->belongsTo(Pegawai::class, 'id_kasir');
    }
    public function rekamobat()
    {
        return $this->hasMany(RekamMedis::Class, 'id_rekam_medis');
    }
}
