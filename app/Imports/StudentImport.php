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
        
        return $student = Student::create([
            'name' => $row['name'],
            'nis' => $row['nis'],            
            'email' => $row['email'],
            'departement_id' => $row['departement_id'],            
            'password' => bcrypt($row['password'])
        ]);
        $student->assignRole('student');
    }

   
    
    public function headingRow(): int
    {
        return 1;
    }

    
}


        