<?php

namespace App\Imports;

use App\Models\Progress;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProgressImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        print_r($row);
        return new Progress([
            'building_id' => $row['building_id'],
            'zone_id' => $row['zone_id'],
            'fmProgress_id' => $row['fmprogress_id'],
            'dateFm'  => $row['datefm'],
            'aisProgress_id'  => $row['aisprogress_id'],
            'dateAis' => $row['dateais'],
            'totProgress_id' => $row['totprogress_id'],
            'dateTot' => $row['datetot'],
            'progress3bb_id' => $row['progress3bb_id'],
            'date3BB' => $row['date3bb'],
            'trueProgress_id' => $row['trueprogress_id'],
            'dateTrue'    => $row['datetrue'],
            'txrtProgress_id' => $row['txrtprogress_id'],
            'dateTxrx'    => $row['datetxrx'],
            'symphonyProgress_id' => $row['symphonyprogress_id'],
            'dateSymphony'    => $row['datesymphony'],
        ]);
    }
}
