<?php

namespace App\Imports;

use App\Models\Planing;
use Maatwebsite\Excel\Concerns\ToModel;

class PlaningsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Planing([
            'building_id' => $row['building_id'],
            'task_id' => $row['task_id'],
            'isp_id' => $row['isp_id'],
            'fmProgress_id' => $row['fmprogress_id'],
            'agentDetail_id'  => $row['agentDetail_id'],
            'jobtype_id'  => $row['jobtype_id'],
            'technician_id' => $row['technician_id'],
            'technician2_id' => $row['technician2_id'],
            'ispId_id' => $row['ispid_id'],
            'type' => $row['type'],
            'name' => $row['name'],
            'surname' => $row['surname'],
            'tel'    => $row['tel'],
            'tel2' => $row['tel2'],
            'theBuilding'    => $row['thebuilding'],
            'floor' => $row['floor'],
            'room'    => $row['room'],
            'circuit' => $row['circuit'],
            'entranceFee'    => $row['entrancefee'],
            'appointmentDate' => $row['appointmentdate'],
            'appointmentTime' => $row['appointmenttime'],
            'status' => $row['status'],
            'subStatus' => $row['substatus'],
            'reMark' => $row['remark']
        ]);
    }
}
