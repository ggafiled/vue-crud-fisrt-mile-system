<?php

namespace App\Imports;

use App\Models\Planing;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        print_r($row);
        return new Planing([
            'task_id'  => $row['task_id'],
            'building_id'  => $row['building_id'],
            'isp_id'  => $row['isp_id'],
            'agentDetail_id'  => $row['agentdetail_id'],
            'jobType_id'  => $row['jobtype_id'],
            'zone_id'  => $row['zone_id'],
            'zone2_id'  => $row['zone2_id'],
            'ispid_id'  => $row['ispid_id'],
            'type'  => $row['type'],
            'name'  => $row['name'],
            'surname'  => $row['surname'],
            'tel'  => $row['tel'],
            'tel2'  => $row['tel2'],
            'theBuilding'  => $row['thebuilding'],
            'floor'  => $row['floor'],
            'room' => $row['room'],
            'circuit' => $row['circuit'],
            'entranceFee' => $row['entrancefee'],
            'appointmentDate' => $row['appointmentdate'],
            'appointmentTime' => $row['appointmenttime'],
            'status' => $row['status'],
            'subStatus' => $row['substatus'],
            'reMark' => $row['remark'],

        ]);

    }
}

