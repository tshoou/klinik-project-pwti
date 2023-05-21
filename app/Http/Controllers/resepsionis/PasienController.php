<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use App\JadwalDokter;
use App\Pasien;
use App\RekamMedis;
use Illuminate\Http\Request;

class PasienController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dokter = JadwalDokter::get();
        $pasien = Pasien::paginate(20);
        return view('resepsionist.pasien.index', ['pasien' => $pasien], compact('dokter'));
    }

    public function search(Request $req)
    {
        $query = new Pasien;

        $search = $req->get('search');

        $pasien = $query
            ->where('tbl_pasien.nama_pasien', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('resepsionist.pasien.index', ['pasien' => $pasien]);
    }

    // Simpan
    public function simpan(Request $req)
    {
        Pasien::create([
            'nama_pasien' => $req->nama_pasien,
            'tgl_lahir' => $req->tgl_lahir,
            'jenis_kelamin' => $req->jenis_kelamin,
            'gol_darah' => $req->gol_darah,
            'status_nikah' => $req->status_nikah,
            'no_telfon' => $req->no_telfon,
            'alamat' => $req->alamat,
        ]);

        return redirect()->route('resepsionist.pasien')->with('message', 'Data Berhasil Ditambah');
    }

    // Edit 
    public function edit($id_pasien)
    {
        $pasien = Pasien::findOrFail($id_pasien);

        return view('resepsionist.pasien.edit', ['pasien' => $pasien]);
    }

    // Update
    public function update(Request $req, $id_pasien)
    {
        Pasien::where('id_pasien', $id_pasien)->update([
            'nama_pasien' => $req->nama_pasien,
            'tgl_lahir' => $req->tgl_lahir,
            'jenis_kelamin' => $req->jenis_kelamin,
            'no_telfon' => $req->no_telfon,
            'gol_darah' => $req->gol_darah,
            'status_nikah' => $req->status_nikah,
            'alamat' => $req->alamat,
        ]);

        return redirect()->route('resepsionist.pasien')->with('message', "Data Berhasil Disunting");
    }

    // detail
    public function detail($id_pasien)
    {
        $dokter = JadwalDokter::get();
        $pasien = Pasien::findOrFail($id_pasien);
        $rekammedis = RekamMedis::where('id_pasien', $id_pasien)->paginate(10);

        return view('resepsionist.pasien.detail', ['pasien' => $pasien, 'rekammedis' => $rekammedis], compact('dokter'));
    }

    // Delete
    public function delete($id_pasien)
    {
        $dataObat = Pasien::where('id_pasien', $id_pasien);

        $dataObat->delete();

        return redirect()->route('resepsionist.pasien')->with('message', "Data Berhasil Dihapus");
    }
}
