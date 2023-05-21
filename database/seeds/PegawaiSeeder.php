<?php

use App\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pegawai = [
            [
                'id_pegawai' => '882761711',
                'nip' => '1018008428',
                'nama' => 'Tuffahati Sholihah',
                'id_golongan' => '1',
            ],
            [
                'id_pegawai' => '617524901',
                'nip' => '1018008454',
                'nama' => 'Cryan Fajri',
                'id_golongan' => '2',
            ],
            [
                'id_pegawai' => '617524965',
                'nip' => '1018008450',
                'nama' => 'Youngk',
                'id_golongan' => '3',
            ],
            [
                'id_pegawai' => '617524944',
                'nip' => '1018008452',
                'nama' => 'Sungjin',
                'id_golongan' => '4',
            ],
        ];

        foreach ($pegawai as $key => $value) {
            Pegawai::create($value);
        }
    }
}
