<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'tbl_obat';
    protected $fillable = ['id_obat', 'nama_obat', 'jenis_obat', 'kegunaan', 'harga'];
}
