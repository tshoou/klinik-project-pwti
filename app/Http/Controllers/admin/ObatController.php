<?php

namespace App\Http\Controllers\admin;

use App\Obat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ObatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function _validation(Request $req)
    {
        $validation = $req->validate(
            [
                'nama_obat' => 'required|unique:tbl_obat,nama_obat|max:255|min:1',
                'jenis_obat' => 'required|max:25|min:1',
                'kegunaan' => 'required',
                'harga' => 'required',
            ],
            [
                'nama_obat.required' => 'Harus di isi',
                'nama_obat.unique' => 'Nama obat sudah ada',
                'nama_obat.min' => 'Minimal 1 huruf',
                'nama_obat.max' => 'Maximal 255 huruf',
                'jenis_obat.required' => 'Harus di isi',
                'jenis_obat.min' => 'Minimal 1 huruf',
                'jenis_obat.max' => 'Maximal 25 huruf',
                'kegunaan.required' => 'Harus Diisi',
                'harga.required' => 'Harus Diisi',
            ]
        );
    }

    // ViewObat
    public function index()
    {
        $listObat = Obat::paginate(10);

        return view('admin.obat.index', ['Obat' => $listObat]);
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

        return view('admin.obat.index', ['Obat' => $listObat]);
    }

    //TambahObat
    public function tambah()
    {
        return view('admin.obat.tambah');
    }
    public function simpan(Request $req)
    {
        $this->_validation($req);

        Obat::insert([
            'nama_obat' => $req->nama_obat,
            'jenis_obat' => $req->jenis_obat,
            'kegunaan' => $req->kegunaan,
            'harga' => $req->harga,
        ]);

        return redirect()->route('admin.obat')->with('message', 'Data Berhasil Ditambah');
    }

    // Edit 
    public function edit($id_obat)
    {
        $listObat = Obat::where('tbl_obat.id_obat', $id_obat)->first();

        return view('admin.obat.edit', ['obat' => $listObat]);
    }

    // Update
    public function update(Request $req, $id_obat)
    {
        $this->validate($req, [
            'nama_obat' => ["required", Rule::unique('tbl_obat', 'nama_obat')->ignore($id_obat, 'id_obat')],
            'jenis_obat' => 'required|max:25|min:1',
            'kegunaan' => 'required',
            'harga' => 'required',
        ]);

        Obat::where('id_obat', $id_obat)->update([
            'nama_obat' => $req->nama_obat,
            'jenis_obat' => $req->jenis_obat,
            'kegunaan' => $req->kegunaan,
            'harga' => $req->harga,
        ]);

        return redirect()->route('admin.obat')->with('message', "Data Berhasil Disunting");
    }

    // Delete
    public function delete($id_obat)
    {
        $dataObat = Obat::where('id_obat', $id_obat);

        $dataObat->delete();

        return redirect()->route('admin.obat')->with('message', "Data Berhasil Dihapus");
    }
}
