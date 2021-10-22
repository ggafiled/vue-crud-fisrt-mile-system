<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Planing extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'building_id',
        'isp_id',
        'agentDetail_id',//
        'jobtype_id',
        'technician_id',
        'ispId_id',
        'type',
        'name',
        'surname',
        'tel',
        'tel2',
        'theBuilding',
        'floor',
        'room',
        'circuit',
        'entranceFee',
        'appointmentDate',
        'appointmentTime',
        'status',
        'subStatus',
        'reMark'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName}")
            ->useLogName('planing')
            ->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    public function building()
    {
        return $this->hasOne('App\Models\Building', 'id', 'building_id');
    }

    public function contractor()
    {
        return $this->belongsTo('App\Models\Contractor', 'customer_id', 'id');
    }

    public function report()
    {
        return $this->belongsTo('App\Models\Report', 'customer_id', 'id');
    }

    public function isp()
    {
        return $this->hasOne('App\Models\Isp', 'id', 'isp_id');
    }

    public function jobtype()
    {
        return $this->hasOne('App\Models\JobTpye', 'id', 'jobtype_id');
    }

    public function technician()
    {
        return $this->hasOne('App\Models\Technician', 'id', 'technician_id');
    }

    public function ispId()
    {
        return $this->hasOne('App\Models\Isp', 'id', 'ispId_id');
    }

    public function agentDetail()
    {
        return $this->hasOne('App\Models\Agent', 'id', 'agentDetail_id');
    }
}
