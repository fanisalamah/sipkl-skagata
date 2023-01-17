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
            'name' => 'Multimedia'
        ]);

        DB::table('departements')->insert([
            'name' => 'SIJA'
        ]);

        DB::table('departements')->insert([
            'name' => 'TKJ'
        ]);

        DB::table('departements')->insert([
            'name' => 'Broadcasting'
        ]);
    }
}
