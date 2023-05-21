<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JadwalDokter;

class DokterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ViewData
    public function index()
    {
        $jadwaldokter = new JadwalDokter;
        $dokter = $jadwaldokter->join('tbl_pegawai', 'tbl_pegawai.id_pegawai', '=', 'tbl_dokter.id_pegawai')->paginate(10);
        return view('resepsionist.dokter.index', ['dokter' => $dokter]);
    }
}
