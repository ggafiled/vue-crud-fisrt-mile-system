<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'projectName',
        'projectNameTot',
        'projectName3bb',
        'projectNameTrue',
        'projectNameAis',
        'projectNameFiberNet',
        'buildingSum',
        'floorSum',
        'roomSum',
        'fmCode',
        'nameManager',
        'phoneManager',
        'mailManager',
        'nameNiti',
        'phoneNiti',
        'mailNiti',
        'houseNumber',
        'squadNumber',
        'alleyName',
        'roadName',
        'districtName',
        'countyName',
        'provinceName',
        'postalCode',
        'longitude',
        'latitude',
        'contractSell',
        'contractDate',
        'contractDateEnd',
        'spendSpace',
        'condition',
        'contractPeriod',
        'reNewContact',
        'areaN',
        'bbN',
        'area3BB',
        'areaTrue',
        'areaTrueNew',
        'areaAis',
        'areaFiberNet',
        'operatingTime',
    ];

    public function progress()
	{
		return $this->hasOne('App\Models\Progress','building_id','id');
	}

    public function constarution()
	{
		return $this->belongsTo('App\Models\Constarution','building_id','id');
	}

    public function planning()
	{
		return $this->belongsTo('App\Models\planning','building_id','id');
	}

    public function get_building() {
        return $this->building()->where('building_id');
    }
}
