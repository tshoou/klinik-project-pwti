<?php

namespace App\Exports;

use App\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DokterExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return Pegawai::where('id_golongan', '3')->join('tbl_dokter', 'tbl_dokter.id_pegawai', 'tbl_pegawai.id_pegawai')->get();
    }
    public function headings(): array
    {
        return [
            ['NIP', 'Nama', 'Jenis Kelamin', 'Email', 'Tanggal Lahir', 'Pendidikan', 'Alamat', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu', 'Biaya Jasa'],
        ];
    }

    public function prepareRows($rows): array
    {
        return array_map(function ($pegawai) {
            $fields = [
                $pegawai->nip,
                $pegawai->nama,
                $pegawai->jenis_kelamin,
                $pegawai->email,
                $pegawai->tgl_lahir,
                $pegawai->pendidikan,
                $pegawai->alamat,
                $pegawai->senin,
                $pegawai->selasa,
                $pegawai->rabu,
                $pegawai->kamis,
                $pegawai->jumat,
                $pegawai->sabtu,
                $pegawai->minggu,
                $pegawai->biaya_jasa,
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
