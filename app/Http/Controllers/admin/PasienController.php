<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pasien;
use App\JadwalDokter;
use App\RekamMedis;

use App\Exports\PasienExport;
use Maatwebsite\Excel\Facades\Excel;

class PasienController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Search
    public function search(Request $req)
    {
        $query = new Pasien;

        $search = $req->get('search');

        $pasien = $query
            ->where('tbl_pasien.nama_pasien', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('admin.pasien.index', ['pasien' => $pasien]);
    }

    public function index()
    {
        $pasien = Pasien::paginate(10);

        return view('admin.pasien.index', ['pasien' => $pasien]);
    }

    public function export()
    {
        return Excel::download(new PasienExport, 'data_pasien.xlsx');
    }

    public function detail($id_pasien)
    {
        $dokter = JadwalDokter::get();
        $pasien = Pasien::findOrFail($id_pasien);
        $rekammedis = RekamMedis::where('id_pasien', $id_pasien)->paginate(10);

        return view('admin.pasien.detail', ['pasien' => $pasien, 'rekammedis' => $rekammedis], compact('dokter'));
    }
    public function delete($id_pasien)
    {
        $ruangan = new Pasien;

        $delete = $ruangan->where('id_pasien', $id_pasien);

        $delete->delete();

        return redirect()->route('admin.pasien')->with('message', 'Data Berhasil Dihapus');
    }
}
