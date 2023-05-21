<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Gedung;

class Ruang extends Model
{
    //
    protected $table = "tbl_ruangan";

    protected $primaryKey = 'id_ruang';

    protected $fillable = ['id_gedung', 'nama_ruang', 'keterangan_fr'];

    public function gedung()
    {
        return $this->belongsTo(Gedung::class, 'id_gedung');
    }
}
