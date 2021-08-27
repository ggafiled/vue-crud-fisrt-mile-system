<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Planing extends Model
{
    use HasFactory,SoftDeletes, LogsActivity;

    protected $fillable = [
        'building_id',
        'problemsolution_id',
        'technician_id',
        'callver_id',
        'callverstatus_id',
        'name',
        'surname',
        'tel',
        'tel2',
        'theBuilding',
        'floor',
        'room',
        'isp',
        'agent',
        'circuit',
        'entranceFee',
        'jobType',
        'appointmentDate',
        'appointmentTime',
        'idRequired',
        'status',
        'subStatus',
        'reMark',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}")
        ->useLogName('planing')
        ->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    public function building()
	{
		return $this->hasMany('App\Models\Building','id','building_id');
	}

    public function Problemsolution()
	{
		return $this->hasOne('App\Models\Problemsolution','id','problemsolution_id');
	}

    public function Technician()
	{
		return $this->hasOne('App\Models\Technician','id','technician_id');
	}

    public function Callver()
	{
		return $this->hasOne('App\Models\Callver','id','callver_id');
	}

    public function Callverstatus()
	{
		return $this->hasOne('App\Models\Callverstatus','id','callverstatus_id');
	}

}

