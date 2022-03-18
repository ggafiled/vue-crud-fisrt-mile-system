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
            'area3bb_id'  => $row['area3bb_id'],
            'areaAis_id'  => $row['areaais_id'],
            'areaTrue_id'  => $row['areatrue_id'],
            'areaTrueNew_id'  => $row['areatruenew_id'],
            'areaFibernet_id'  => $row['areafibernet_id'],
            'areaTxrx_id'  => $row['areatxrx_id'],
            'areaSyphony_id'  => $row['areasyphony_id'],
            'contractTerm_id'  => $row['contractterm_id'],
            'paymentType_id'  => $row['paymenttype_id'],
            'saleFm_id'  => $row['salefm_id'],
            'workTime_id'  => $row['worktime_id'],
            'projectName'  => $row['projectname'],
            'subBuildingsum' => $row['subbuildingsum'],
            'floorSum' => $row['floorsum'],
            'roomSum' => $row['roomsum'],
            'nameNiti' => $row['nameniti'],
            'phoneNiti' => $row['phoneniti'],
            'mailNiti' => $row['mailniti'],
            'houseNumber' => $row['housenumber'],
            'squadNumber' => $row['squadnumber'],
            'alleyName' => $row['alleyname'],
            'roadName' => $row['roadname'],
            'districtName' => $row['districtname'],
            'provinceName' => $row['provincename'],
            'countyName' => $row['countyname'],
            'postalCode' => $row['postalcode'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
            'contractStartDate' => $row['contractstartdate'],
            'contractEndDate' => $row['contractenddate'],
            'balance' => $row['balance'],
            'remarkContract' => $row['remarkcontract'],
            'remark' => $row['remark'],
            'spendSpace' => $row['spendspace'],
        ]);

    }
}
// 'projectName'  => $row['Project'],
// 'mailManager' => $row['Mail'],
// 'nameNiti' => $row['Name']
