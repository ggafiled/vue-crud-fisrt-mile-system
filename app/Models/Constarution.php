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
        'building_id',
        'projectNameTot',
        'projectName3bb',
        'projectNameTrue',
        'projectNameAis',
        'projectNameFiberNet',
        'desingBy',
        'surveyDesing',
        'surveyDesingDate',
        'ifcc',
        'ifccDate',
        'wallBox',
        'wallBoxDate',
        'type',
        'microductD',
        'microductDateD',
        'microductK',
        'microductDateK',
        'fiberConvertion',
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
}