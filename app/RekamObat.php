<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamObat extends Model
{
    protected $table = 'rekam_obat';
    protected $primaryKey = 'id_rekam_obat';
    protected $fillable = ['id_rekam_medis', 'id_obat'];
    public function rekammedis()
    {
        return $this->belongsToMany(RekamMedis::class, 'id_rekam_medis');
    }
    public function obat()
    {
        return $this->belongsToMany(Obat::class, 'id_obat');
    }
}
