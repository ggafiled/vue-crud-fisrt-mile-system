<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Constarution extends Model
{
    use SoftDeletes, LogsActivity;

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
        'splice'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}")
        ->useLogName('constarution')
        ->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    public function building()
    {
        return $this->hasMany('App\Models\Building', 'id', 'building_id');
    }

    public function desingBy()
    {
        return $this->belongsTo('App\Models\Teamserway', 'desingBy_id', 'id');
    }

    public function surveyDesing()
    {
        return $this->belongsTo('App\Models\Generatingaction', 'surveyDesing_id', 'id');
    }

    public function ifcc()
    {
        return $this->belongsTo('App\Models\Generatingaction', 'ifcc_id', 'id');
    }

    public function wallBox()
    {
        return $this->belongsTo('App\Models\Generatingaction', 'wallBox_id', 'id');
    }

    public function microductD()
    {
        return $this->belongsTo('App\Models\Generatingaction', 'microductD_id', 'id');
    }

    public function microductK()
    {
        return $this->belongsTo('App\Models\Generatingaction', 'microductK_id', 'id');
    }

    public function fiberConvertion()
    {
        return $this->belongsTo('App\Models\Generatingaction', 'fiberConvertion_id', 'id');
    }

}
