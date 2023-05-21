<?php

use App\Obat;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obat = [
            [
                'nama_obat' => 'Amoxlyin',
                'jenis_obat' => 'Pil',
                'kegunaan' => 'sakit kepala',
                'harga' => '25000',
            ],
            [
                'nama_obat' => 'Antiyaui',
                'jenis_obat' => 'Syrup',
                'kegunaan' => 'sakit kepala',
                'harga' => '25000',
            ],
            [
                'nama_obat' => 'Dringding',
                'jenis_obat' => 'Pil',
                'kegunaan' => 'sakit kepala',
                'harga' => '25000',
            ],
            [
                'nama_obat' => 'Yuyi',
                'jenis_obat' => 'Pil',
                'kegunaan' => 'maag',
                'harga' => '50000',
            ],
        ];

        foreach ($obat as $key => $value) {
            Obat::create($value);
        }
    }
}
