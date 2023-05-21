<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use App\Obat;
use Illuminate\Http\Request;
use App\RekamMedis;
use App\RekamObat;

class RekamMedisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id_pegawai)
    {
        $rekam = new RekamMedis;

        $rekama = $rekam->join('tbl_dokter', 'tbl_dokter.id_dokter', '=', 'rekam_medis.id_dokter')
            ->where('tbl_dokter.id_pegawai', $id_pegawai)
            ->Where('rekam_medis.ket_proses', 'proses_periksa')->paginate(15);

        return view('dokter.rekamMedis.index', ['rekama' => $rekama]);
    }

    public function periksa($id_rekam_medis)
    {
        // $rekam = new RekamMedis;
        $rekama = RekamMedis::findOrFail($id_rekam_medis);
        $obat = Obat::get();
        return view('dokter.rekamMedis.periksa', ['rekama' => $rekama, 'obat' => $obat]);
    }

    // Search
    public function search(Request $req, $id_pegawai)
    {
        $rekam = new RekamMedis;

        $rekama = $rekam->join('tbl_dokter', 'tbl_dokter.id_dokter', '=', 'rekam_medis.id_dokter')
            ->where('tbl_dokter.id_pegawai', $id_pegawai)
            ->Where('rekam_medis.ket_proses', 'selesai')->paginate(15);

        // $search = $req->get('search');

        // $ruang = $query
        //     ->where('tbl_ruangan.nama_ruang', 'like', '%' . $search . '%')
        //     ->orWhere('tbl_gedung.id_gedung', 'like', '%' . $search . '%')
        //     ->paginate(10);

        return view('dokter.rekamMedis.index', ['rekama' => $rekama]);
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

        return view('dokter.rekamMedis.detail', ['rekammedis' => $rekammedis, 'rekamobat' => $rekamobat]);
    }

    public function update(Request $req, $id_rekam_medis)
    {
        $rekam_medis = new RekamMedis;
        RekamMedis::findOrFail($id_rekam_medis)->update([
            'keluhan' => $req->keluhan,
            'diagnosa' => $req->diagnosa,
            'ket_proses' => 'proses_pembayaran',
        ]);
        foreach ($req->obat as $item) :
            $rekam_obat = new RekamObat;
            $rekam_obat->id_rekam_medis = $id_rekam_medis;
            $rekam_obat->id_obat = $item;
            $rekam_obat->save();
        endforeach;
        return redirect()->route('dokter.home')->with('success', 'Data Berhasil Di Update');
    }
}
