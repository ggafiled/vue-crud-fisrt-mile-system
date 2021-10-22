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
        'fmProgress',
        'teamserway',
        'surweyDate',
        'ifcccType',
        'ifcccStatus',//table
        'wallboxType',
        'wallboxStatus',
        'microductType',
        'microductStatus',
        'microductType1',
        'microductType2',
        'microductSize',
        'microductFloor',
        'blowStatus',
        'blowCore',
        'convertionalType',
        'convertionalFloor',
        'vertically',
        'verticallyType',
        'buildingStatus',
        'buildingDate',
        'spliceStatus',
        'spliceCore',
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\Building', 'building_id', 'id');
    }

    public function progress()
    {
        return $this->hasOne('App\Models\Progress', 'constarution_id', 'id');
    }


}