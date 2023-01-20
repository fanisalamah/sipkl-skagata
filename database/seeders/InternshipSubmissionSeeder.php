<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InternshipSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('internship_submissions')->insert([
            'student_id' => '1',
            'industry_id' => '1',
            'url_acceptance' => 'bukti diterima.pdf',
            'status' => '1',
            'advisor_id' => null
        ]);

        DB::table('internship_submissions')->insert([
            'student_id' => '2',
            'industry_id' => '2',
            'url_acceptance' => 'bukti diterima.pdf',
            'status' => '1',
            'advisor_id' => null
        ]);

    }
}
