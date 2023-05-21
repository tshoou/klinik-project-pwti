<?php

namespace App\Exports;

use App\Pasien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PasienExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return Pasien::all();
    }
    public function headings(): array
    {
        return [
            ['Nama Pasien', 'Tanggal Lahir', 'Jenis Kelamin', 'No Telfon', 'Gol Darah', 'Status Nikah', 'Alamat', 'Terdaftar'],
        ];
    }

    public function prepareRows($rows): array
    {
        return array_map(function ($pasien) {
            $fields = [
                $pasien->nama_pasien,
                $pasien->tgl_lahir,
                $pasien->jenis_kelamin,
                $pasien->no_telfon,
                $pasien->gol_darah,
                $pasien->status_nikah,
                $pasien->alamat,
                $pasien->created_at,
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
