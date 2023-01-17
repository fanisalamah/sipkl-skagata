<?php

namespace App\Imports;

use App\Models\Advisor;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdvisorImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return $advisor = Advisor::create([
            'name' => $row['name'],
            'nip' => $row['nip'],
            'email' => $row['email'],
            'departement_id' => $row['departement_id'],            
            'password' => bcrypt($row['password'])
        ]);
        $advisor->assignRole('advisor');
        
    }   
    
    public function headingRow(): int
    {
        return 1;
    }

    
}


        