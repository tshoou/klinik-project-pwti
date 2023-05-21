<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pegawai;
use App\Jabatan;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // viewData
    public function index()
    {
        $listPegawai = Pegawai::whereNotIn('id_golongan', ['1', '3'])->paginate(10);

        return view('resepsionist.pegawai.index', ['Pegawai' => $listPegawai]);
    }

    // Search
    public function search(Request $req)
    {
        $jabatan = new Jabatan;
        $peg = new Pegawai;
        $query = $peg->join('tbl_jabatan', 'tbl_jabatan.id_golongan', '=', 'tbl_pegawai.id_golongan');
        $search = $req->get('search');
        $dataPegawai = $query
            ->where('tbl_pegawai.nama', 'like', '%' . $search . '%')
            ->orWhere('tbl_pegawai.nip', 'like', '%' . $search . '%')
            ->orWhere('tbl_jabatan.nama_jabatan', 'like', '%' . $search . '%')
            ->paginate(10);
        return view('resepsionist.pegawai.index', ['Pegawai' => $dataPegawai]);
    }

    // Detail
    public function detail($id_pegawai)
    {
        $listPegawai = Pegawai::findOrFail($id_pegawai);

        return view('resepsionist.pegawai.detail', ['pegawai' => $listPegawai]);
    }
}
