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
        'Zone_id',
        'Zone2_id',
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
        'reMark',

        'callver_id',
        'callverStatus_id',
        'problemsolution_id',
        'appointmentTimeCustomer',
        'idRequired',
        'confirmAppointment',
        'confirmAppointmentTime',
        'reMarkzone',
        'equipmentInstall1',
        'snInstall1',
        'equipmentInstall2',
        'snInstall2',
        'equipmentInstall3',
        'snInstall3',
        'equipmentInstall4',
        'snInstall4',
        'equipmentInstall5',
        'snInstall5',
        'equipmentInstall6',
        'snInstall6',
        'equipmentInstall7',
        'snInstall7'
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

    public function zone()
    {
        return $this->hasOne('App\Models\Zone', 'id', 'Zone_id');
    }

    public function zone2()
    {
        return $this->hasOne('App\Models\Zone', 'id', 'Zone2_id');
    }

    public function ispId()
    {
        return $this->hasOne('App\Models\Isp', 'id', 'ispId_id');
    }

    public function agentDetail()
    {
        return $this->hasOne('App\Models\Agent', 'id', 'agentDetail_id');
    }

    public function callver()
    {
        return $this->hasOne('App\Models\Callver', 'id', 'callver_id');
    }

    public function callverstatus()
    {
        return $this->hasOne('App\Models\Callverstatus', 'id', 'callverStatus_id');
    }

    public function problemSolution()
    {
        return $this->hasOne('App\Models\Problemsolution', 'id', 'problemsolution_id');
    }
}
