<?php

namespace App\Exports;

use App\RekamMedis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RekamMedisExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return RekamMedis::where('ket_proses', 'selesai')->join('tbl_pasien', 'tbl_pasien.id_pasien', '=', 'rekam_medis.id_pasien')->join('rekam_obat', 'rekam_obat.id_rekam_medis', '=', 'rekam_medis.id_rekam_medis')->join('tbl_obat', 'tbl_obat.id_obat', '=', 'rekam_obat.id_obat')->get();
    }
    public function headings(): array
    {
        return [
            ['ID Pasien', 'Nama Pasien', 'Tanggal Lahir', 'Jenis Kelamin', 'No Telfon', 'Gol Darah', 'Status Nikah', 'Alamat', 'Terdaftar', 'Keluhan', 'Diagnosa', 'Dokter', 'Keterangan Masuk', 'Tanggal Masuk', 'Tanggal Keluar', 'Obat', 'Total Pembayaran', 'Kasir'],
        ];
    }

    public function prepareRows($rows): array
    {
        return array_map(function ($pasien) {
            $fields = [
                $pasien->id_pasien,
                $pasien->nama_pasien,
                $pasien->tgl_lahir,
                $pasien->jenis_kelamin,
                $pasien->no_telfon,
                $pasien->gol_darah,
                $pasien->status_nikah,
                $pasien->alamat,
                $pasien->pasien()->first()->created_at,
                $pasien->keluhan,
                $pasien->diagnosa,
                $pasien->dokter()->first()->pegawai()->first()->nama,
                $pasien->keterangan_masuk,
                $pasien->tgl_masuk,
                $pasien->tgl_keluar,
                $pasien->nama_obat,
                $pasien->total_pembayaran,
                $pasien->kasir()->first()->nama,
            ];
            return $fields;
        }, $rows);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
