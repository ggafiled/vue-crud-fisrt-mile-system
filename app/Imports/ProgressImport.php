<?php

namespace App\Imports;

use App\Models\Progress;
use Maatwebsite\Excel\Concerns\ToModel;

class ProgressImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Progress([
            'building_id' => $row['building_id'],
            'zone_id' => $row['zone_id'],
            'constarution_id' => $row['constarution_id'],
            'fmProgress_id' => $row['fmprogress_id'],
            'aisProgress_id'  => $row['aisprogress_id'],
            'totProgress_id'  => $row['totprogress_id'],
            'progress3bb_id' => $row['progress3bb_id'],
            'sinetProgress_id' => $row['sinetprogress_id'],
            'fnProgress_id' => $row['fnProgress_id'],
            'trueProgress_id' => $row['trueprogress_id'],
            'txrtProgress_id' => $row['txrtprogress_id'],
            'symphonyProgress_id' => $row['symphonyprogress_id'],
            'dateFm'    => $row['datefm'],
            'dateTot' => $row['datetot'],
            'dateAis'    => $row['dateais'],
            'date3BB' => $row['date3bb'],
            'dateSinet'    => $row['datesinet'],
            'dateFn' => $row['datefn'],
            'dateTrue'    => $row['datetrue'],
            'dateTxrx' => $row['datetxrx'],
            'dateSymphony' => $row['datesymphony'],
            'snInstall6' => $row['sninstall6'],
            'statusProgress' => $row['statusProgress']
        ]);
    }
}
