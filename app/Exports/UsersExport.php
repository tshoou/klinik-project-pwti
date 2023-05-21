<?php

namespace App\Exports;

use App\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithStyles
{

    public function collection()
    {
        return Pegawai::all();
    }
    public function headings(): array
    {
        return [
            ['NIP', 'Nama', 'Jenis Kelamin', 'Email', 'Tanggal Lahir', 'Jabatan', 'Pendidikan', 'Alamat'],
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
                $pegawai->jabatan()->first()->nama_jabatan,
                $pegawai->pendidikan,
                $pegawai->alamat,
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
