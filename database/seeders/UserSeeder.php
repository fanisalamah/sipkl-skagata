<?php

namespace Database\Seeders;

use App\Models\Advisor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed Administrator
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.id',
            'departement_id' => '1',
            'password' => Hash::make('123123123'),
        ]);
        $admin->assignRole('admin');



        // Seed Advisor Guru Pembimbing
        $advisor = Advisor::create([
            'name' => 'Arif Eka',
            'nip' => '12345678',
            'email' => 'arif@gmail.com',
            'departement_id' => '1',
            'password' => Hash::make('123123123'),
        ]);
        $advisor->assignRole('advisor');
        
        $advisor = Advisor::create([
            'name' => 'Untung Suprapto',
            'nip' => '7654321',
            'email' => 'untung@gmail.com',
            'departement_id' => '1',
            'password' => Hash::make('123123123'),
        ]);
        $advisor->assignRole('advisor');



        // Seed Student
        $student = Student::create([
            'name' => 'Fani Salamah',
            'nis' => '28535',
            'email' => 'fani@gmail.com',
            'departement_id' => '1',
            'password' => Hash::make('123123123'),
        ]);
        $student->assignRole('student');

        $student = Student::create([
            'name' => 'Vera Sumenil',
            'nis' => '28534',
            'email' => 'vera@gmail.com',
            'departement_id' => '1',
            'password' => Hash::make('123123123'),
        ]);
        $student->assignRole('student');

    }
       
}
