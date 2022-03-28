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
            'reMark' => $row['remark'],

            'callver_id' => $row['callver_id'],
            'callverStatus_id' => $row['callverstatus_id'],
            'problemsolution_id' => $row['problemsolution_id'],
            'appointmentTimeCustomer' => $row['appointmenttimecustomer'],
            'idRequired' => $row['idrequired'],
            'confirmAppointment' => $row['confirmappointment'],
            'confirmAppointmentTime' => $row['confirmappointmenttime'],
            'reMarkzone' => $row['remarkzone'],
            'equipmentInstall1' => $row['equipmentinstall1'],
            'snInstall1' => $row['sninstall1'],
            'equipmentInstall2' => $row['equipmentinstall2'],
            'snInstall2' => $row['sninstall2'],
            'equipmentInstall3' => $row['equipmentinstall3'],
            'snInstall3' => $row['sninstall3'],
            'equipmentInstall4' => $row['equipmentinstall4'],
            'snInstall4' => $row['sninstall4'],
            'equipmentInstall5' => $row['equipmentinstall5'],
            'snInstall5' => $row['sninstall5'],
            'equipmentInstall6' => $row['equipmentinstall6'],
            'snInstall6' => $row['sninstall6'],
            'equipmentInstall7' => $row['equipmentinstall7'],
            'snInstall7' => $row['sninstall7'],

            'statusContrater' => $row['statuscontrater'],
            'dateConnect' => $row['dateconnect'],
            'dateDisconnect' => $row['datedisconnect'],
            'workSheet' => $row['worksheet'],
            'reMarkAccount' => $row['remarkaccount'],
        ]);
    }
}
