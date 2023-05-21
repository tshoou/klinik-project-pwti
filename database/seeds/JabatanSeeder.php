<?php

use App\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan = [
            [
                'nama_jabatan' => 'admin',
            ],
            [
                'nama_jabatan' => 'resepsionist',
            ],
            [
                'nama_jabatan' => 'dokter',
            ],
            [
                'nama_jabatan' => 'kasir',
            ],
        ];

        foreach ($jabatan as $key => $value) {
            Jabatan::create($value);
        }
    }
}
