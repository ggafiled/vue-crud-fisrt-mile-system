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
        'desingBy_id',
        'surveyDesing_id',
        'ifcc_id',
        'wallBox_id',
        'microductD_id',
        'microductK_id',
        'fiberConvertion_id',
        'projectNameTot',
        'projectName3bb',
        'projectNameTrue',
        'projectNameAis',
        'projectNameFiberNet',
        'surveyDesingDate',
        'ifccDate',
        'wallBoxDate',
        'type',
        'microductDateD',
        'microductDateK',
        'fiberConvertionDateD',
        'blow',
        'splice',
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\Building', 'building_id', 'id');
    }

    public function desingBy()
    {
        return $this->hasOne('App\Models\Teamserway', 'id', 'desingBy_id');
    }

    public function surveyDesing()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'surveyDesing_id');
    }

    public function ifcc()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'ifcc_id');
    }

    public function wallBox()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'wallBox_id');
    }

    public function microductD()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'microductD_id');
    }

    public function microductK()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'microductK_id');
    }

    public function fiberConvertion()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'fiberConvertion_id');
    }

}