<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $login = [
            [
                'id_pegawai' => '882761711',
                'nip' => '1018008428',
                'id_golongan' => '1',
                'password' => Hash::make('paksi123'),
            ],
            [
                'id_pegawai' => '617524901',
                'nip' => '1018008454',
                'id_golongan' => '2',
                'password' => Hash::make('paksi123'),
            ],
            [
                'id_pegawai' => '617524965',
                'nip' => '1018008450',
                'id_golongan' => '3',
                'password' => Hash::make('paksi123'),
            ],
            [
                'id_pegawai' => '617524944',
                'nip' => '1018008452',
                'id_golongan' => '4',
                'password' => Hash::make('paksi123'),
            ],
        ];

        foreach ($login as $key => $value) {
            User::create($value);
        }
    }
}
