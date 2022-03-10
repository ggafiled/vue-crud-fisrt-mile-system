<?php

namespace App\Imports;


use App\Models\Constarution;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ConstarutionsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Constarution([
            'building_id'  => $row['building_id'],
            'projectNameTot' => $row['projectnametot'],
            'projectName3bb' => $row['projectname3bb'],
            'projectNameTrue' => $row['projectnametrue'],
            'projectNameAis' => $row['projectnameais'],
            'projectNameFiberNet' => $row['projectnamefibernet'],
            'projectNameTxrt' => $row['projectnametxrt'],
            'buildingSum' => $row['buildingsum'],
            'buildingNumber' => $row['buildingnumber'],
            'buildingFloor' => $row['buildingfloor'],
            'unitFloor' => $row['unitfloor'],
            'fmProgress' => $row['fmprogress'],
            'teamserway' => $row['teamserway'],
            'surweyDate' => $row['surweydate'],
            'ifcccType' => $row['ifccctype'],
            'ifcccStatus' => $row['ifcccstatus'],
            'wallboxType' => $row['wallboxtype'],
            'wallboxStatus' => $row['wallboxstatus'],
            'microductType' => $row['microducttype'],
            'microductStatus' => $row['microductstatus'],
            'microductType1' => $row['microducttype1'],
            'microductType2' => $row['microducttype2'],
            'microductSize' => $row['microductsize'],
            'microductFloor' => $row['microductfloor'],
            'blowStatus' => $row['blowstatus'],
            'blowCore' => $row['blowcore'],
            'convertionalType' => $row['convertionaltype'],
            'convertionalFloor' => $row['convertionalfloor'],
            'vertically' => $row['vertically'],
            'verticallyType' => $row['verticallytype'],
            'buildingStatus' => $row['buildingstatus'],
            'buildingDate' => $row['buildingdate'],
            'spliceStatus' => $row['splicestatus'],
            'spliceCore' => $row['splicecore'],
        ]);
    }
}
