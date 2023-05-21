<?php

use App\JadwalDokter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class dokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JadwalDokter::create([
            'id_pegawai' => '617524965',
            'senin' => '22.00-21.00',
            'selasa' => '22.00-21.00',
            'rabu' => '22.00-21.00',
            'kamis' => '-',
            'jumat' => '-',
            'sabtu' => '22.00-21.00',
            'minggu' => '22.00-21.00',
            'biaya_jasa' => '50000',
        ]);
    }
}
