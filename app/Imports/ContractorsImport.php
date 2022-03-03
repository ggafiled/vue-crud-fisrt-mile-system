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
            'building_id' => $row[0],
            'callver_id' => $row[1],
            'appointmentTimeCustomer' => $row[3],
            'callverStatus_id' => $row[4],
            'technicians_id'  => $row[5],
            'idRequired'  => $row[6],
            'problemsolution_id' => $row[7],
            'confirmAppointment' => $row[8],
            'confirmAppointmentTime' => $row[9],
            'reMarkzone' => $row[10],
            'equipmentInstall1' => $row[11],
            'snInstall1' => $row[12],
            'equipmentInstall2'    => $row[13],
            'snInstall2' => $row[14],
            'equipmentInstall3'    => $row[15],
            'snInstall3' => $row[16],
            'equipmentInstall4'    => $row[17],
            'snInstall4' => $row[18],
            'equipmentInstall5'    => $row[19],
            'snInstall5' => $row[20],
            'equipmentInstall6' => $row[21],
            'snInstall6' => $row[22],
            'equipmentInstall7' => $row[23],
            'snInstall7' => $row[24],
        ]);
    }
}
