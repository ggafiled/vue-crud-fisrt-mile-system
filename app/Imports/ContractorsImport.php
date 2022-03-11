<?php

namespace App\Imports;

use App\Models\Contractor;
use Maatwebsite\Excel\Concerns\ToModel;

class ContractorsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contractor([
            'building_id' => $row['building_id'],
            'callver_id' => $row['callver_id'],
            'appointmentTimeCustomer' => $row['appointmentTimeCustomer'],
            'callverStatus_id' => $row['callverStatus_id'],
            'technicians_id'  => $row['technicians_id'],
            'idRequired'  => $row['idRequired'],
            'problemsolution_id' => $row['problemsolution_id'],
            'confirmAppointment' => $row['confirmAppointment'],
            'confirmAppointmentTime' => $row['confirmAppointmentTime'],
            'reMarkzone' => $row['reMarkzone'],
            'equipmentInstall1' => $row['equipmentInstall1'],
            'snInstall1' => $row['snInstall1'],
            'equipmentInstall2'    => $row['equipmentInstall2'],
            'snInstall2' => $row['snInstall2'],
            'equipmentInstall3'    => $row['equipmentInstall3'],
            'snInstall3' => $row['snInstall3'],
            'equipmentInstall4'    => $row['equipmentInstall4'],
            'snInstall4' => $row['snInstall4'],
            'equipmentInstall5'    => $row['equipmentInstall5'],
            'snInstall5' => $row['snInstall5'],
            'equipmentInstall6' => $row['equipmentInstall6'],
            'snInstall6' => $row['snInstall6'],
            'equipmentInstall7' => $row['equipmentInstall7'],
            'snInstall7' => $row['snInstall7'],
        ]);
    }
}
