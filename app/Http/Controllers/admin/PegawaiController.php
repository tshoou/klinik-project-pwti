<?php

namespace App\Http\Controllers\admin;

use App\Pegawai;
use App\Jabatan;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Validation
    public function _validation(Request $req)
    {
        $validation = $req->validate(
            [
                'nip' => 'required|min:1|max:15',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'email' => 'required',
                'tgl_lahir' => 'required',
                'id_golongan' => 'required',
                'pendidikan' => 'required',
                'foto' => 'required',

            ],
            [
                'nip.required' => 'Harus Diisi',
                'nip.min' => 'minimal 1 digit',
                'nip.max' => 'maximal 15 digit',
                'nama.required' => 'Harus Diisi',
                'jenis_kelamin.required' => 'Harus Diisi',
                'alamat.required' => 'Harus Diisi',
                'email.required' => 'Harus Diisi',
                'tgl_lahir.required' => 'Harus Diisi',
                'id_golongan.required' => 'Harus Diisi',
                'pendidikan.required' => 'Harus Diisi',
                'foto.required' => 'Harus Diisi',
            ]
        );
    }

    // viewData
    public function index()
    {
        $listPegawai = Pegawai::whereNotIn('id_golongan', ['3'])->paginate(10);

        return view('admin.pegawai.index', ['Pegawai' => $listPegawai]);
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'data_pegawai.xlsx');
    }

    // Add
    public function tambah()
    {
        $jabatan = new Jabatan;

        $list = Jabatan::whereNotIn('tbl_jabatan.nama_jabatan', ['admin', 'resepsionist', 'kasir', 'dokter'])->get();

        return view('admin.pegawai.tambah', compact('list'));
    }

    // save
    public function simpan(Request $req)
    {
        $this->_validation($req);

        function random($digit)
        {
            $karakter = '1234567890';

            $string = '';

            for ($i = 0; $i < $digit; $i++) {
                $post = rand(0, strlen($karakter) - 1);
                $string .= $karakter{
                    $post};
            };

            return $string;
        }

        $random = random(8);

        $file = $req->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'uploads/';

        $file->move($tujuan_upload, $nama_file);

        Pegawai::create([
            'id_pegawai' => $random,
            'nip' => $req->nip,
            'nama' => $req->nama,
            'jenis_kelamin' => $req->jenis_kelamin,
            'alamat' => $req->alamat,
            'email' => $req->email,
            'tgl_lahir' => $req->tgl_lahir,
            'id_golongan' => $req->id_golongan,
            'pendidikan' => $req->pendidikan,
            'foto' => $nama_file,
        ]);

        return redirect()->route('admin.pegawai')->with('message', 'Data Berhasil Disimpan');
    }

    // Detail
    public function detail($id_pegawai)
    {
        $listPegawai = Pegawai::findOrFail($id_pegawai);

        return view('admin.pegawai.detail', ['pegawai' => $listPegawai]);
    }

    // Search
    public function search(Request $req)
    {
        $jabatan = new Jabatan;
        $peg = new Pegawai;
        $query = $peg->join('tbl_jabatan', 'tbl_jabatan.id_golongan', '=', 'tbl_pegawai.id_golongan');
        $search = $req->get('search');
        $dataPegawai = $query
            ->where('tbl_pegawai.nama', 'like', '%' . $search . '%')
            ->orWhere('tbl_pegawai.nip', 'like', '%' . $search . '%')
            ->orWhere('tbl_jabatan.nama_jabatan', 'like', '%' . $search . '%')
            ->paginate(10);
        return view('admin.pegawai.index', ['Pegawai' => $dataPegawai]);
    }

    // Edit
    public function edit($id_pegawai)
    {
        $list = Jabatan::whereNotIn('tbl_jabatan.nama_jabatan', ['admin', 'resepsionist', 'kasir', 'dokter'])->get();

        $dataPegawai = Pegawai::findOrFail($id_pegawai);

        return view('admin.pegawai.edit', ['pegawai' => $dataPegawai], compact('list'));
    }

    // Update
    public function update(Request $req, $id_pegawai)
    {
        $this->validate($req, [
            'nip' => ["required", Rule::unique('tbl_pegawai', 'nip')->ignore($id_pegawai, 'id_pegawai')],
        ]);

        Pegawai::findOrFail($id_pegawai)->update([
            'nip' => $req->nip,
            'nama' => $req->nama,
            'jenis_kelamin' => $req->jenis_kelamin,
            'alamat' => $req->alamat,
            'email' => $req->email,
            'tgl_lahir' => $req->tgl_lahir,
            'id_golongan' => $req->id_golongan,
            'pendidikan' => $req->pendidikan,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        return redirect()->route('admin.pegawai')->with('message', 'Data Berhasil Disunting');
    }

    // Updatefoto
    public function updateFoto(Request $req, $id_pegawai)
    {
        $pegawai = Pegawai::findOrFail($id_pegawai);
        File::delete('uploads/' . $pegawai->foto);
        $file = $req->file('foto');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'uploads';
        $file->move($tujuan_upload, $nama_file);
        $pegawai->where('id_pegawai', $id_pegawai)->update([
            'foto' => $nama_file,
        ]);
        return redirect()->route('admin.pegawai')->with('message', 'Foto Pegawai berhasil diedit');
    }

    // Delete
    public function delete($id_pegawai)
    {
        $dataPegawai = Pegawai::where('id_pegawai', $id_pegawai);

        $dataPegawai->delete();

        return redirect()->route('admin.pegawai')->with('message', 'Data Berhasil Dihapus');
    }
}
