<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departements')->insert([
            'name' => 'Broadcasting & Perfilman'
        ]);

        DB::table('departements')->insert([
            'name' => 'TKJ & Telekomunikasi'
        ]);

        DB::table('departements')->insert([
            'name' => 'Desain Pemodelan & Informasi Bangunan'
        ]);

        DB::table('departements')->insert([
            'name' => 'Teknik Konstruksi & Perumahan'
        ]);
        DB::table('departements')->insert([
            'name' => 'Teknik Elektronika'
        ]);
        DB::table('departements')->insert([
            'name' => 'Teknik Ketenagalistrikan'
        ]);
        DB::table('departements')->insert([
            'name' => 'Teknik Otomotif'
        ]);
        DB::table('departements')->insert([
            'name' => 'Teknik Mesin'
        ]);
    }
}
