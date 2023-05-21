<?php

namespace App\Http\Controllers\admin;

use App\Jabatan;
use App\User;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\JadwalDokter;

use App\Exports\DokterExport;
use Maatwebsite\Excel\Facades\Excel;

class DokterController extends Controller
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
                'senin' => 'required',
                'selasa' => 'required',
                'rabu' => 'required',
                'kamis' => 'required',
                'jumat' => 'required',
                'sabtu' => 'required',
                'minggu' => 'required',
                'biaya_jasa' => 'required',
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
                'senin.required' => 'harus di isi',
                'selasa.required' => 'harus di isi',
                'rabu.required' => 'harus di isi',
                'kamis.required' => 'harus di isi',
                'jumat.required' => 'harus di isi',
                'sabtu.required' => 'harus di isi',
                'minggu.required' => 'harus di isi',
                'biaya_jasa.required' => 'harus di isi',
                'password.required' => 'harus di isi',
            ]
        );
    }
    // ViewData
    public function index()
    {
        $jadwaldokter = new JadwalDokter;
        $dokter = $jadwaldokter->join('tbl_pegawai', 'tbl_pegawai.id_pegawai', '=', 'tbl_dokter.id_pegawai')->paginate(10);
        $list = Jabatan::get();
        return view('admin.dokter.index', ['dokter' => $dokter], compact('list'));
    }

    public function export()
    {
        return Excel::download(new DokterExport, 'data_dokter.xlsx');
    }

    // Search
    public function search(Request $req)
    {
        $jabatan = new Jabatan;
        $list = $jabatan->get();
        $jadwaldokter = new JadwalDokter;
        $query = $jadwaldokter->join('tbl_pegawai', 'tbl_pegawai.id_pegawai', '=', 'tbl_dokter.id_pegawai');
        $search = $req->get('search');
        $dokter = $query
            ->where('tbl_pegawai.nama', 'like', '%' . $search . '%')
            ->orWhere('tbl_pegawai.nip', 'like', '%' . $search . '%')
            ->paginate(20);
        return view('admin.dokter.index', ['dokter' => $dokter], compact('list'));
    }

    // Simpan
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

        // $this->_validation($req);

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

        JadwalDokter::create([
            'id_pegawai' => $random,
            'senin' => $req->senin,
            'selasa' => $req->selasa,
            'rabu' => $req->rabu,
            'kamis' => $req->kamis,
            'jumat' => $req->jumat,
            'sabtu' => $req->sabtu,
            'minggu' => $req->minggu,
            'biaya_jasa' => $req->biaya_jasa,
        ]);

        return redirect()->route('admin.dokter')->with('message', 'Data berhasil ditambah');
    }
    public function delete($id_pegawai)
    {
        $dataPegawai = Pegawai::where('id_pegawai', $id_pegawai);

        $dataPegawai->delete();

        return redirect()->route('admin.dokter')->with('message', 'Data Berhasil Dihapus');
    }
};
