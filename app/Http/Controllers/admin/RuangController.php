<?php

namespace App\Http\Controllers\admin;

use App\Gedung;
use App\Ruang;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class RuangController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function _validation(Request $req)
    {
        $validation = $req->validate(
            [
                'nama_ruang' => 'required|unique:tbl_ruangan,nama_ruang|max:75|min:1',
                'keterangan_fr' => 'required',
            ],
            [
                'nama.required' => 'harus diisi',
                'nama.required' => 'nama ruang sudah terdaftar',
                'nama.min' => 'manimal 1 huruf',
                'nama.max' => 'maximal 75 huruf',
                'keterangan_fr.required' => 'harus diisi',
            ]
        );
    }

    // View Data
    public function index()
    {
        $list = Gedung::get();
        $ruang = Ruang::paginate(10);

        return view('admin.ruangan.index', ['Ruangan' => $ruang], compact('list'));
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

        return view('admin.ruangan.index', ['Ruangan' => $ruang], compact('list'));
    }

    // Add
    public function tambah()
    {
        $list = Gedung::get();

        return view('admin.ruangan.tambah', compact('list'));
    }

    // Save
    public function simpan(Request $req)
    {
        $this->_validation($req);

        Ruang::create([
            'id_gedung' => $req->id_gedung,
            'nama_ruang' => $req->nama_ruang,
            'keterangan_fr' => $req->keterangan_fr,
        ]);

        return redirect()->route('admin.ruang')->with('message', 'Data Berhasil Tersimpan');
    }

    // Edit
    public function edit($id_ruang)
    {
        $list = Gedung::get();

        $ruang = Ruang::findOrFail($id_ruang);

        return view('admin.ruangan.edit', ['ruang' => $ruang], compact('list'));
    }

    // Update
    public function update(Request $req, $id_ruang)
    {
        $this->validate($req, [
            'nama_ruang' => ["required", Rule::unique('tbl_ruangan', 'nama_ruang')->ignore($id_ruang, 'id_ruang')],
        ]);

        Ruang::findOrFail($id_ruang)->update([
            'id_gedung' => $req->id_gedung,
            'nama_ruang' => $req->nama_ruang,
            'keterangan_fr' => $req->keterangan_fr
        ]);

        return redirect()->route('admin.ruang')->with('message', 'Data Berhasil Disunting');
    }

    // Delete
    public function delete($id_ruang)
    {
        $ruangan = new Ruang;

        $listRawat = $ruangan->where('id_ruang', $id_ruang);

        $listRawat->delete();

        return redirect()->route('admin.ruang')->with('message', 'Data Berhasil Dihapus');
    }
}
