<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\User;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        try {

            switch($row['jurusan']) {
                case('Broadcasting & Perfilman'):
                    return $student = Student::create([
                        'name' => $row['name'],
                        'nis' => $row['nis'],            
                        'email' => $row['email'],
                        'departement_id' => '1',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $student->assignRole('student');
                break;
                case('TKJ & Telekomunikasi'):
                    return $student = Student::create([
                        'name' => $row['name'],
                        'nis' => $row['nis'],            
                        'email' => $row['email'],
                        'departement_id' => '2',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $student->assignRole('student');
                break;
                case('Desain Pemodelan & Informasi Bangunan'):
                    return $student = Student::create([
                        'name' => $row['name'],
                        'nis' => $row['nis'],            
                        'email' => $row['email'],
                        'departement_id' => '3',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $student->assignRole('student');
                break;
                case('Teknik Konstruksi & Perumahan'):
                    return $student = Student::create([
                        'name' => $row['name'],
                        'nis' => $row['nis'],            
                        'email' => $row['email'],
                        'departement_id' => '4',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $student->assignRole('student');
                break;
                case('Teknik Elektronika'):
                    return $student = Student::create([
                        'name' => $row['name'],
                        'nis' => $row['nis'],            
                        'email' => $row['email'],
                        'departement_id' => '5',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $student->assignRole('student');
                break;
                case('Teknik Ketenagalistrikan'):
                    return $student = Student::create([
                        'name' => $row['name'],
                        'nis' => $row['nis'],            
                        'email' => $row['email'],
                        'departement_id' => '6',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $student->assignRole('student');
                break;
                case('Teknik Otomotif'):
                    return $student = Student::create([
                        'name' => $row['name'],
                        'nis' => $row['nis'],            
                        'email' => $row['email'],
                        'departement_id' => '7',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $student->assignRole('student');
                break;
                case('Teknik Mesin'):
                    return $student = Student::create([
                        'name' => $row['name'],
                        'nis' => $row['nis'],            
                        'email' => $row['email'],
                        'departement_id' => '8',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $student->assignRole('student');
                break;
                
            }
        }

        catch(\Exception $e) {

            $e->getMessage();
        }
       
    }

   
    
    public function headingRow(): int
    {
        return 1;
    }

    
}


        