<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Constarution extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'building_id',
        'projectNameTot',
        'projectName3bb',
        'projectNameTrue',
        'projectNameAis',
        'projectNameFiberNet',
        'buildingSum',
        'buildingNumber',
        'buildingFloor',
        'unitFloor',
        'fmProgress_id',
        'teamserway_id',
        'surweyDate',
        'ifcccType',
        'ifccStatus_id',
        'wallboxType',
        'microductStatus_id',
        'fiberMicroductType',
        'fiberMicroduct1',
        'fiberMicroduct2',
        'fiberMicroductSize',
        'fiberMicroductFloor',
        'fiberBlowStatus_id',
        'fiberConvertionalType',
        'fiberConvertionalFloor',
        'fiberVertically',
        'fiberVerticallyType',
        'fiberBuildingStatus',
        'blow',
        'spliceStatus_id',
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\Building', 'building_id', 'id');
    }

    public function Teamserway()
    {
        return $this->hasOne('App\Models\Teamserway', 'id', 'teamserway_id');
    }


}
