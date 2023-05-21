<?php

namespace App\Http\Controllers\admin;

use App\Jabatan;
use App\User;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AkunController extends Controller
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
                'nama' => 'required|max:70|min:1',
                'nip' => 'required|unique:users,nip|max:20|min:8',
                'password' => 'required',
            ],
            [
                'nama.required' => 'harus di isi',
                'nama.min' => 'minimal 1 digit',
                'nama.max' => 'maksimal 70 digit',
                'nip.required' => 'harus di isi',
                'nip.unique' => 'NIP sudah terdaftar',
                'nip.min' => 'minimal 8 digit',
                'nip.max' => 'maksimal 20 digit',
                'password.required' => 'harus di isi',
            ]
        );
    }
    // ViewData
    public function index()
    {
        $akun = User::paginate(10);

        $list = Jabatan::whereIn('nama_jabatan', ['admin', 'resepsionist', 'dokter', 'kasir'])->get();

        return view('admin.akun.index', ['akun' => $akun], compact('list'));
    }

    // Search
    public function search(Request $req)
    {
        $user = new User;
        $list = Jabatan::get();

        $query = $user->join('tbl_pegawai', 'tbl_pegawai.id_pegawai', '=', 'users.id_pegawai')->join('tbl_jabatan', 'tbl_jabatan.id_golongan', '=', 'tbl_pegawai.id_golongan');

        $search = $req->get('search');

        $akun = $query
            ->where('users.nip', 'like', '%' . $search . '%')
            ->orWhere('tbl_pegawai.nama', 'like', '%' . $search . '%')
            ->orWhere('tbl_jabatan.nama_jabatan', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('admin.akun.index', ['akun' => $akun], compact('list'));
    }
    public function tambah()
    {
        $list = Jabatan::whereIn('nama_jabatan', ['admin', 'resepsionist', 'dokter', 'kasir'])->get();

        return view('admin.akun.tambah', compact('list'));
    }
    public function simpan(Request $req)
    {
        function random($digit)
        {
            $karakter = '1234567890';
            // HI
            $string = '';

            for ($i = 0; $i < $digit; $i++) {
                $post = rand(0, strlen($karakter) - 1);
                $string .= $karakter{
                    $post};
            };

            return $string;
        }

        $random = random(8);

        $this->_validation($req);

        Pegawai::create([
            'id_pegawai' => $random,
            'nip' => $req->nip,
            'nama' => $req->nama,
            'id_golongan' => $req->jabatan,
        ]);

        User::create([
            'id_pegawai' => $random,
            'id_golongan' => $req->jabatan,
            'nip' => $req->nip,
            'password' => Hash::make($req['password']),
        ]);

        return redirect()->route('admin.akun')->with('message', 'Data berhasil ditambah');
    }
    public function edit($id_pegawai)
    {
        $list = Jabatan::whereIn('nama_jabatan', ['admin', 'resepsionist', 'dokter', 'kasir'])->get();

        $akun = User::where('id_pegawai', $id_pegawai)->first();

        return view('admin.akun.edit', ['akun' => $akun], compact('list'));
    }
    public function update(Request $req, $id_pegawai)
    {
        $this->validate($req, [
            'nip' => ["required", Rule::unique('users', 'nip')->ignore($id_pegawai, 'id_pegawai')],
            'nama' => 'required|max:70|min:1',
            'password' => 'required',
        ]);

        Pegawai::where('id_pegawai', $id_pegawai)->update([
            'nip' => $req->nip,
            'nama' => $req->nama,
            'email' => $req->email,
            'id_golongan' => $req->jabatan,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        User::where('id_pegawai', $id_pegawai)->update([
            'nip' => $req->nip,
            'id_golongan' => $req->jabatan,
            'password' => Hash::make($req['password']),
        ]);

        return redirect()->route('admin.akun')->with('message', 'Data berhasil diedit');
    }
    public function delete($id_pegawai)
    {
        $data = User::where('id_pegawai', $id_pegawai);

        $data->delete();

        $data2 = Pegawai::where('id_pegawai', $id_pegawai);

        $data2->delete();

        return redirect()->route('admin.akun')->with('message', 'Data berhasil dihapus');
    }
}
