<?php

namespace App\Http\Controllers\admin;

use App\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AdmPasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // validation

    public function _validation(Request $req)
    {
        $validation = $req->validate(
            [
                'nama_pasien' =>'required',
                'tgl_lahir' =>'required',
                'jenis_kelamin' =>'required',
                'no_telfon' =>'required',
                'gol_darah' =>'required',
                'status_nikah' =>'required',
                'alamat' =>'required',
            ],
            [
                'nama_pasien.required'=>'Harus Diisi',
                'tgl_lahir.required' =>'Harus Diisi',
                'jenis_kelamin.required' =>'Harus Diisi',
                'no_telfon.required' =>'Harus Diisi',
                'gol_darah.required' =>'Harus Diisi',
                'status_nikah.required' =>'Harus Diisi',
                'alamat.required' =>'Harus Diisi',
            ]
        );
    }
    // viewData

    public function index()
    {
        $dataPasien = Pasien::paginate(10);

        return view('admin.pasien.index', ['Pasien' => $dataPasien]);
    }
}
