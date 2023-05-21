<?php

namespace App\Http\Controllers\admin;

use App\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JabatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Validation
    private function _validation(Request $req)
    {
        $validation = $req->validate(
            [
                'nama_jabatan' => 'required|max:25|min:1',
            ],
            [
                'nama_jabatan.required' => 'Harus di isi',
                'nama_jabatan.min' => 'Minimal 1 huruf',
                'nama_jabatan.max' => 'Maximal 25 huruf',
            ]
        );
    }

    //ViewData
    public function index()
    {
        $allJabatan = Jabatan::paginate(10);

        return view('admin.jabatan.index', ['Jabatan' => $allJabatan]);
    }

    // Search
    public function search(Request $req)
    {
        $search = $req->get('search');

        $jabatan = Jabatan::where('tbl_jabatan.nama_jabatan', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('admin.jabatan.index', ['Jabatan' => $jabatan]);
    }

    // Add
    public function tambah()
    {
        return view('admin.jabatan.tambah');
    }

    // Save
    public function simpan(Request $req)
    {
        $this->_validation($req);

        Jabatan::create([
            'nama_jabatan' => $req->nama_jabatan,
        ]);

        return redirect()->route('admin.jabatan')->with('message', 'Data Berhasil Ditambah');
    }

    // Edit
    public function edit($id_golongan)
    {
        $allJabatan =  Jabatan::findOrFail($id_golongan);

        return view('admin.jabatan.edit', ['jabatan' => $allJabatan]);
    }

    // Update
    public function update(Request $req, $id_golongan)
    {
        $this->_validation($req);

        Jabatan::findOrFail($id_golongan)->update([
            'nama_jabatan' => $req->nama_jabatan,
        ]);

        return redirect()->route('admin.jabatan')->with('message', 'Berhasil Menyimpan');
    }

    // Delete
    public function delete($id_golongan)
    {
        $datajabatan = Jabatan::where('id_golongan', $id_golongan);

        $datajabatan->delete();

        return redirect()->route('admin.jabatan')->with('message', "Data Berhasil Dihapus");
    }
}
