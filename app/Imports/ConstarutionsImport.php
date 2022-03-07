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
            'projectNameTot' => $row['projectNameTot'],
            'projectName3bb' => $row['projectName3bb'],
            'projectNameTrue' => $row['projectNameTrue'],
            'projectNameAis' => $row['projectNameAis'],
            'projectNameFiberNet' => $row['projectNameFiberNet'],
            'projectNameTxrt' => $row['projectNameTxrt'],
            'buildingSum' => $row['buildingSum'],
            'buildingNumber' => $row['buildingNumber'],
            'buildingFloor' => $row['buildingFloor'],
            'unitFloor' => $row['unitFloor'],
            'fmProgress' => $row['fmProgress'],
            'teamserway' => $row['teamserway'],
            'surweyDate' => $row['surweyDate'],
            'ifcccType' => $row['ifcccType'],
            'ifcccStatus' => $row['ifcccStatus'],
            'wallboxType' => $row['wallboxType'],
            'wallboxStatus' => $row['wallboxStatus'],
            'microductType' => $row['microductType'],
            'microductStatus' => $row['microductStatus'],
            'microductType1' => $row['microductType1'],
            'microductType2' => $row['microductType2'],
            'microductSize' => $row['microductSize'],
            'microductFloor' => $row['microductFloor'],
            'blowStatus' => $row['blowStatus'],
            'blowCore' => $row['blowCore'],
            'convertionalType' => $row['convertionalType'],
            'convertionalFloor' => $row['convertionalFloor'],
            'vertically' => $row['vertically'],
            'verticallyType' => $row['verticallyType'],
            'buildingStatus' => $row['buildingStatus'],
            'buildingDate' => $row['buildingDate'],
            'spliceStatus' => $row['spliceStatus'],
            'spliceCore' => $row['spliceCore'],
        ]);
    }
}
