<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Pegawai;
use App\Dokter;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pegawai', 'nip', 'id_golongan', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::Class, 'id_pegawai');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::Class, 'id_golongan');
    }
    public function dokter()
    {
        return $this->belongsTo(Dokter::Class, 'id_dokter');
    }
}
