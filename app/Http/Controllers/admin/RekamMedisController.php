<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\RekamMedis;
use App\Pasien;
use Illuminate\Http\Request;

use App\Exports\RekamMedisExport;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('admin.rekamMedis.index', ['rekammedis' => $rekammedis]);
    }

    public function export()
    {
        return Excel::download(new RekamMedisExport, 'data_rekam_medis.xlsx');
    }

    public function search(Request $req)
    {
        $rekam = new RekamMedis;
        $query = $rekam->join('tbl_pasien', 'tbl_pasien.id_pasien', '=', 'rekam_medis.id_pasien');

        $search = $req->get('search');

        $rekammedis = $query
            ->where('tbl_pasien.nama_pasien', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('admin.rekamMedis.index', ['rekammedis' => $rekammedis]);
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

        return view('admin.rekamMedis.detail', ['rekammedis' => $rekammedis, 'rekamobat' => $rekamobat]);
    }
    public function delete($id_rekam_medis)
    {
        $ruangan = new RekamMedis;

        $delete = $ruangan->where('id_rekam_medis', $id_rekam_medis);

        $delete->delete();

        return redirect()->route('admin.rekammedis')->with('message', 'Data Berhasil Dihapus');
    }
}
