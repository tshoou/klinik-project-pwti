<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Obat;

class ObatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        $listObat = Obat::paginate(10);

        return view('dokter.obat.index', ['Obat' => $listObat]);
    }

    // Search Data
    public function search(Request $req)
    {
        $search = $req->get('search');

        $listObat = Obat::where('tbl_obat.nama_obat', 'like', '%' . $search . '%')
            ->orWhere('tbl_obat.jenis_obat', 'like', '%' . $search . '%')
            ->orWhere('tbl_obat.kegunaan', 'like', '%' . $search . '%')
            ->orWhere('tbl_obat.harga', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('dokter.obat.index', ['Obat' => $listObat]);
    }
}
