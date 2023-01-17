<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->insert([
            'name' => 'iNews TV Yogyakarta',
            'address' => 'Jalan Laksda Adisucipto No. 279 Depok, Sleman, Yogyakarta'
        ]);

        DB::table('industries')->insert([
            'name' => 'Anton Photo',
            'address' => 'Jalan Godean km 10 Ngijon, Sleman'
        ]);

    }
}
