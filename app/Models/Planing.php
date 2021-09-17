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
        'callver_id',
        'callverStatus_id',
        'ispId_id',
        'problemsolution_id',
        'name',
        'surname',
        'tel',
        'tel2',
        'theBuilding',
        'floor',
        'room',
        'agent',
        'circuit',
        'entranceFee',
        'appointmentDate',
        'appointmentTime',
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

    public function callver()
    {
        return $this->hasOne('App\Models\Callver', 'id', 'callver_id');
    }

    public function callverstatus()
    {
        return $this->hasOne('App\Models\Callverstatus', 'id', 'callverStatus_id');
    }

    public function ispId()
    {
        return $this->hasOne('App\Models\Isp', 'id', 'ispId_id');
    }

    public function problemsolution()
    {
        return $this->hasOne('App\Models\Problemsolution', 'id', 'problemsolution_id');
    }

    public function agentDetail()
    {
        return $this->hasOne('App\Models\Agent', 'id', 'agentDetail_id');
    }
}