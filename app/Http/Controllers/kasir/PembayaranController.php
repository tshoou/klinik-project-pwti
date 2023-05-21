<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
use App\Pasien;
use App\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Index
    public function index()
    {
        $rekamMedis = RekamMedis::where('rekam_medis.ket_proses', 'proses_pembayaran')->paginate(15);
        return view('kasir.PembayaranProses.index', ['rekammedis' => $rekamMedis]);
    }

    // Search Data
    public function search(Request $req)
    {
        $search = $req->get('search');

        $rekamjoin = new RekamMedis;
        $query = $rekamjoin->join('tbl_pasien', 'tbl_pasien.id_pasien', '=', 'rekam_medis.id_pasien');

        $rekamMedis = $query->where('tbl_pasien.nama_pasien', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('kasir.PembayaranProses.index', ['rekammedis' => $rekamMedis]);
    }

    // Filter process & success
    public function filter(Request $req)
    {
        $rekam = new RekamMedis;

        $rekamMedis = $rekam
            ->Where('rekam_medis.ket_proses', 'selesai')->paginate(15);
        return view('kasir.PembayaranProses.index', ['rekammedis' => $rekamMedis]);
    }

    public function generatePDF($id)
    {
        $data = RekamMedis::findOrFail($id);
        $rekam = new RekamMedis;

        // $data = $rekam
        // ->join('tbl_dokter', 'tbl_dokter.id_dokter', '=', 'rekam_medis.id_dokter')
        // ->join('tbl_pasien', 'tbl_pasien.id_pasien', '=', 'rekam_medis.id_pasien')
        // ->join('rekam_obat', 'rekam_obat.id_rekam_medis', '=', 'rekam_medis.id_rekam_medis')
        // ->join('tbl_obat', 'tbl_obat.id_obat', '=', 'rekam_obat.id_obat')
        // ->where('rekam_medis.id_rekam_medis', $id)->get();
        $pdf = \PDF::loadView('kasir.pembayaranProses.pdf', ['data' => $data]);
        return $pdf->download('laporan-pdf.pdf');
    }

    // Detail 
    public function detail($id_rekam_medis)
    {
        $rekam = new RekamMedis;
        $id = $id_rekam_medis;
        $rekamMedis = $rekam
            ->join('rekam_obat', 'rekam_obat.id_rekam_medis', '=', 'rekam_medis.id_rekam_medis')
            ->join('tbl_obat', 'tbl_obat.id_obat', '=', 'rekam_obat.id_obat')
            ->where('rekam_medis.id_rekam_medis', $id_rekam_medis)
            ->get();
        return view('kasir.PembayaranProses.detail', ['rekammedis' => $rekamMedis, 'id' => $id]);
    }

    // Pembayaran
    public function bayar(Request $req, $id)
    {
        $date = Carbon::now()->format('Y-m-d');
        RekamMedis::findOrFail($id)->update([
            'tgl_keluar' => $date,
            'ket_proses' => "selesai",
            'id_kasir' => $req->id_kasir,
            'total_pembayaran' => $req->total_pembayaran,
        ]);
        return redirect()->route('kasir.pembayaranProses')->with('message', 'Sukses');
    }
}
