<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JabatanSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(LoginSeeder::class);
        $this->call(dokterSeeder::class);
        // $this->call(ObatSeeder::class);
    }
}
