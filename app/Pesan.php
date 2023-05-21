<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'tbl_pesan';
    protected $fillable = ['nama_lengkap', 'no_telfon', 'email', 'pesan'];
}
