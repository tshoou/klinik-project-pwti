<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ViewObat
    public function index()
    {
        $data = Pesan::paginate(10);

        return view('admin.pesan.index', ['data' => $data]);
    }

    // Search Data
    public function search(Request $req)
    {
        $search = $req->get('search');

        $data = Pesan::where('tbl_pesan.nama_lengkap', 'like', '%' . $search . '%')
            ->orWhere('tbl_pesan.no_telfon', 'like', '%' . $search . '%')
            ->orWhere('tbl_pesan.email', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('admin.pesan.index', ['data' => $data]);
    }
}
