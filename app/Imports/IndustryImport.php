<?php

namespace App\Imports;

use App\Models\Industry;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IndustryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Industry([
            'name' => $row['name'],
            'address' => $row['address'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
