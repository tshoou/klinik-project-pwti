<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\gedung;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class GedungController extends Controller
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
                'nama_gedung' => 'required|unique:tbl_gedung,nama_gedung|max:50|min:1',
                'lantai' => 'required',
                'tgl_berdiri' => 'required'
            ],
            [
                'nama_gedung.required' => 'Harus Diisi',
                'nama_gedung.unique' => 'Nama gedung sudah terdaftar',
                'nama_gedung.min' => 'Minimal 1 Huruf',
                'nama_gedung.max' => 'Maximal 50 Huruf',
                'lantai.required' => 'Harus Diisi',
                'tgl_berdiri.required' => 'Harus Diisi'
            ]
        );
    }

    // View Data
    public function index()
    {
        $listGedung = Gedung::paginate(10);

        return view('admin.gedung.index', ['Gedung' => $listGedung]);
    }

    // Search
    public function search(Request $req)
    {
        $search = $req->get('search');

        $listGedung = Gedung::where('tbl_gedung.nama_gedung', 'like', '%' . $search . '%')->paginate(10);

        return view('admin.gedung.index', ['Gedung' => $listGedung]);
    }

    // Add
    public function tambah()
    {
        $listGedung = Gedung::paginate(10);

        return view('admin.gedung.tambah', ['Gedung' => $listGedung]);
    }

    // Save
    public function simpan(Request $req)
    {
        $this->_validation($req);

        Gedung::create([
            'nama_gedung' => $req->nama_gedung,
            'lantai' => $req->lantai,
            'tgl_berdiri' => $req->tgl_berdiri,
        ]);

        return redirect()->route('admin.gedung')->with('message', 'Data Berhasil Disimpan');
    }

    // Edit
    public function edit($id_gedung)
    {
        $listGedung = Gedung::findOrFail($id_gedung);

        return view('admin.gedung.edit', ['Gedung' => $listGedung]);
    }

    // Update
    public function update(Request $req, $id_gedung)
    {
        $this->validate($req, [
            'nama_gedung' => ["required", Rule::unique('tbl_gedung', 'nama_gedung')->ignore($id_gedung, 'id_gedung')],
        ]);

        Gedung::findOrFail($id_gedung)->update([
            'nama_gedung' => $req->nama_gedung,
            'lantai' => $req->lantai,
            'tgl_berdiri' => $req->tgl_berdiri,
        ]);

        return redirect()->route('admin.gedung')->with('message', 'Data Berhasil Disunting');
    }

    // Delete
    public function delete($id_gedung)
    {
        $listGedung = Gedung::where('id_gedung', $id_gedung);

        $listGedung->delete();

        return redirect()->route('admin.gedung')->with('message', 'Data Berhasil Dihapus');
    }
}
