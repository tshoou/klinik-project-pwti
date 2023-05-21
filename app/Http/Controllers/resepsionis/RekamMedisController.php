<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use App\RekamMedis;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rekam = new RekamMedis;
        $rekammedis = $rekam->join('tbl_pasien', 'tbl_pasien.id_pasien', '=', 'rekam_medis.id_pasien')->paginate(10);
        return view('resepsionist.rekamMedis.index', ['rekammedis' => $rekammedis]);
    }

    public function search(Request $req)
    {
        $rekam = new RekamMedis;
        $query = $rekam->join('tbl_pasien', 'tbl_pasien.id_pasien', '=', 'rekam_medis.id_pasien');

        $search = $req->get('search');

        $rekammedis = $query
            ->where('tbl_pasien.nama_pasien', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('resepsionist.rekammedis.index', ['rekammedis' => $rekammedis]);
    }

    public function simpan(Request $req)
    {
        // $rekam = new RekamMedis;
        // $rekammedis = $rekam->join('tbl_pasien', 'tbl_pasien.id_pasien', '=', 'rekam_medis.id_pasien')->paginate(10);
        RekamMedis::create([
            'id_pasien' => $req->id_pasien,
            'keluhan' => $req->keluhan,
            'id_dokter' => $req->id_dokter,
            'keterangan_masuk' => $req->keterangan_masuk,
            'tgl_masuk' => Carbon::now(),
            'ket_proses' => 'proses_periksa',
        ]);
        return redirect()->route('resepsionist.rekammedis')->with('message', 'Data Berhasil Ditambahkan');
    }

    public function detail($id_rekam_medis)
    {
        $rekam = new RekamMedis;
        $rekammedis = $rekam
            ->where('rekam_medis.id_rekam_medis', $id_rekam_medis)
            ->get();

        $rekamobat = $rekam
            ->join('rekam_obat', 'rekam_obat.id_rekam_medis', '=', 'rekam_medis.id_rekam_medis')
            ->join('tbl_obat', 'tbl_obat.id_obat', '=', 'rekam_obat.id_obat')
            ->where('rekam_medis.id_rekam_medis', $id_rekam_medis)
            ->get();

        return view('resepsionist.rekamMedis.detail', ['rekammedis' => $rekammedis, 'rekamobat' => $rekamobat]);
    }

    public function delete($id_rekam_medis)
    {
        $ruangan = new RekamMedis;

        $delete = $ruangan->where('id_rekam_medis', $id_rekam_medis);

        $delete->delete();

        return redirect()->route('resepsionist.rekammedis')->with('message', 'Data Berhasil Dihapus');
    }
}
