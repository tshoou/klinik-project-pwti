<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\gedung;

class GedungController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // View Data
    public function index()
    {
        $listGedung = Gedung::paginate(10);

        return view('resepsionist.gedung.index', ['Gedung' => $listGedung]);
    }

    // Search
    public function search(Request $req)
    {
        $search = $req->get('search');

        $listGedung = Gedung::where('tbl_gedung.nama_gedung', 'like', '%' . $search . '%')->paginate(10);

        return view('resepsionist.gedung.index', ['Gedung' => $listGedung]);
    }
}
