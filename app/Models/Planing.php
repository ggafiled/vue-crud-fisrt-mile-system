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
        'agentDetail_id',
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
        return $this->hasMany('App\Models\Building', 'id', 'building_id');
    }

    public function isp()
    {
        return $this->belongsTo('App\Models\Isp', 'isp_id', 'id');
    }

    public function jobtype()
    {
        return $this->belongsTo('App\Models\JobTpye', 'jobtype_id', 'id');
    }

    public function technician()
    {
        return $this->belongsTo('App\Models\Technician', 'technician_id', 'id');
    }

    public function callver()
    {
        return $this->belongsTo('App\Models\Callver', 'callver_id', 'id');
    }

    public function callverstatus()
    {
        return $this->belongsTo('App\Models\Callverstatus', 'callverStatus_id', 'id');
    }

    public function ispId()
    {
        return $this->belongsTo('App\Models\Isp', 'ispId_id', 'id');
    }

    public function problemsolution()
    {
        return $this->belongsTo('App\Models\Problemsolution', 'problemsolution_id', 'id');
    }

    public function agentDetail()
    {
        return $this->belongsTo('App\Models\Agent', 'agentDetail_id', 'id');
    }
}
