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
        
        try {
            switch($row['jurusan']) {
                case('Broadcasting & Perfilman'):
                    return $advisor = Advisor::create([
                        'name' => $row['name'],
                        'nip' => $row['nip'],
                        'email' => $row['email'],
                        'departement_id' => '1',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $advisor->assignRole('advisor');
                break; 
                
                case('TKJ & Telekomunikasi'):
                    return $advisor = Advisor::create([
                        'name' => $row['name'],
                        'nip' => $row['nip'],
                        'email' => $row['email'],
                        'departement_id' => '2',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $advisor->assignRole('advisor');
                break; 
                case('Desain Pemodelan & Informasi Bangunan'):
                    return $advisor = Advisor::create([
                        'name' => $row['name'],
                        'nip' => $row['nip'],
                        'email' => $row['email'],
                        'departement_id' => '3',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $advisor->assignRole('advisor');
                break; 
                case('Teknik Konstruksi & Perumahan'):
                    return $advisor = Advisor::create([
                        'name' => $row['name'],
                        'nip' => $row['nip'],
                        'email' => $row['email'],
                        'departement_id' => '4',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $advisor->assignRole('advisor');
                break; 
                case('Teknik Elektronika'):
                    return $advisor = Advisor::create([
                        'name' => $row['name'],
                        'nip' => $row['nip'],
                        'email' => $row['email'],
                        'departement_id' => '5',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $advisor->assignRole('advisor');
                break; 
                case('Teknik Ketenagalistrikan'):
                    return $advisor = Advisor::create([
                        'name' => $row['name'],
                        'nip' => $row['nip'],
                        'email' => $row['email'],
                        'departement_id' => '6',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $advisor->assignRole('advisor');
                break; 
                case('Teknik Otomotif'):
                    return $advisor = Advisor::create([
                        'name' => $row['name'],
                        'nip' => $row['nip'],
                        'email' => $row['email'],
                        'departement_id' => '7',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $advisor->assignRole('advisor');
                break; 
                case('Teknik Mesin'):
                    return $advisor = Advisor::create([
                        'name' => $row['name'],
                        'nip' => $row['nip'],
                        'email' => $row['email'],
                        'departement_id' => '8',            
                        'password' => bcrypt($row['password'])
                    ]);
                    $advisor->assignRole('advisor');
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


        