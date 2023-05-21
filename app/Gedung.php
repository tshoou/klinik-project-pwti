<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    //
    protected $table = 'tbl_gedung';
    protected $primaryKey = 'id_gedung';
    protected $fillable = ['nama_gedung', 'lantai', 'tgl_berdiri'];
    public function ruang()
    {
        return $this->hasMany(Ruang::Class);
    }
}
