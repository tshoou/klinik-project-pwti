<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gedung;
use App\Ruang;

class RuangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // View Data
    public function index()
    {
        $list = Gedung::get();
        $ruang = Ruang::paginate(10);

        return view('resepsionist.ruangan.index', ['Ruangan' => $ruang], compact('list'));
    }

    // Search
    public function search(Request $req)
    {
        $ruangan = new Ruang;
        $list = Gedung::get();

        $query = $ruangan->join('tbl_gedung', 'tbl_gedung.id_gedung', '=', 'tbl_ruangan.id_gedung');

        $search = $req->get('search');

        $ruang = $query
            ->where('tbl_ruangan.nama_ruang', 'like', '%' . $search . '%')
            ->orWhere('tbl_ruangan.keterangan_fr', 'like', '%' . $search . '%')
            ->orWhere('tbl_gedung.nama_gedung', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('resepsionist.ruangan.index', ['Ruangan' => $ruang], compact('list'));
    }
}
