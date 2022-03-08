<?php

namespace App\Imports;

use App\Models\Building;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BuildingsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        print_r($row);
        return new Building([
            'areas_id'  => $row['areas_id'],
            'bbns_id'  => $row['bbns_id'],
            'projectName'  => $row['projectname'],
            'phoneNiti' => $row['phoneniti'],
            'nameNiti' => $row['nameniti'],
        ]);

    }
}
// 'projectName'  => $row['Project'],
// 'mailManager' => $row['Mail'],
// 'nameNiti' => $row['Name']
