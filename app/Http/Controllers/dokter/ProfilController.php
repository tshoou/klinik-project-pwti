<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use App\JadwalDokter;
use Illuminate\Http\Request;

use File;
use App\User;
use App\Pegawai;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id_pegawai)
    {
        $user = new User;
        $profil = $user->join('tbl_pegawai', 'tbl_pegawai.id_pegawai', '=', 'users.id_pegawai')->join('tbl_dokter', 'tbl_dokter.id_pegawai', '=', 'tbl_pegawai.id_pegawai')->join('tbl_jabatan', 'tbl_jabatan.id_golongan', '=', 'tbl_pegawai.id_golongan')->where('users.id_pegawai', $id_pegawai)->get();
        return view('dokter.profil.index', ['profil' => $profil]);
    }
    public function edit($id_pegawai)
    {
        $user = new User;
        $profil = $user->join('tbl_pegawai', 'tbl_pegawai.id_pegawai', '=', 'users.id_pegawai')->join('tbl_dokter', 'tbl_dokter.id_pegawai', '=', 'tbl_pegawai.id_pegawai')->join('tbl_jabatan', 'tbl_jabatan.id_golongan', '=', 'tbl_pegawai.id_golongan')->where('users.id_pegawai', $id_pegawai)->first();
        return view('dokter.profil.edit', ['profil' => $profil]);
    }
    public function update(Request $req, $id_pegawai)
    {
        // dd($req->all());
        $pegawai = new Pegawai;
        $pegawai->where('id_pegawai', $id_pegawai)->update([
            'nama' => $req->nama,
            'jenis_kelamin' => $req->jenis_kelamin,
            'alamat' => $req->alamat,
            'email' => $req->email,
            'tgl_lahir' => $req->tanggal_lahir,
            'pendidikan' => $req->pendidikan,
        ]);

        JadwalDokter::where('id_pegawai', $id_pegawai)->update([
            'senin' => $req->senin,
            'selasa' => $req->selasa,
            'rabu' => $req->rabu,
            'kamis' => $req->kamis,
            'jumat' => $req->jumat,
            'sabtu' => $req->sabtu,
            'minggu' => $req->minggu,
            'biaya_jasa' => $req->biaya_jasa,
        ]);

        return redirect()->route('dokter.home')->with('message', 'Profil berhasil diedit');
    }
    public function updateFoto(Request $req, $id_pegawai)
    {
        $user = new User;
        $pegawai = new Pegawai;
        $oldFoto = $user->join('tbl_pegawai', 'tbl_pegawai.id_pegawai', '=', 'users.id_pegawai')->where('users.id_pegawai', $id_pegawai)->first();
        File::delete('uploads/' . $oldFoto->foto);
        $file = $req->file('foto');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'uploads';
        $file->move($tujuan_upload, $nama_file);
        $pegawai->where('id_pegawai', $id_pegawai)->update([
            'foto' => $nama_file,
        ]);
        return redirect()->route('dokter.home')->with('message', 'Foto Profil berhasil diedit');
    }
}
