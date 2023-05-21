<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use App\JadwalDokter;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jadwal = JadwalDokter::get();
        return view('dokter.jadwalDokter.index', ['jadwal' => $jadwal]);
    }
}
