<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JadwalDokter;
use App\Pegawai;
use App\Pesan;
use App\Ruang;

class PasienController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function dokter()
    {
        $jadwaldokter = new JadwalDokter;
        $dokter = $jadwaldokter->join('tbl_pegawai', 'tbl_pegawai.id_pegawai', '=', 'tbl_dokter.id_pegawai')->paginate(10);
        return view('dokter', ['dokter' => $dokter]);
    }
    public function detailDokter($id_pegawai)
    {
        $dokter = Pegawai::findOrFail($id_pegawai);

        return view('detailDokter', ['dokter' => $dokter]);
    }
    // Search
    public function search(Request $req)
    {
        $jadwaldokter = new JadwalDokter;
        $query = $jadwaldokter->join('tbl_pegawai', 'tbl_pegawai.id_pegawai', '=', 'tbl_dokter.id_pegawai');
        $search = $req->get('search');
        $dokter = $query
            ->where('tbl_pegawai.nama', 'like', '%' . $search . '%')
            ->paginate(10);
        return view('dokter', ['dokter' => $dokter]);
    }
    public function fasilitas()
    {
        $ruangan = Ruang::get();

        return view('fasilitas', ['ruangan' => $ruangan]);
    }
    public function kontak()
    {
        return view('contact');
    }
    public function kirim(Request $req)
    {
        Pesan::create([
            'nama_lengkap' => $req->nama,
            'no_telfon' => $req->notelp,
            'email' => $req->email,
            'pesan' => $req->pesan,
        ]);

        return redirect()->route('webprofil.kontak')->with('message', 'Pesan anda berhasil terkirim, tunggu telfon dari pihak kami');
    }
}
