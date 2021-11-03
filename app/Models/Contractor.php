<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class Contractor extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'building_id',
        'callver_id',
        'appointmentTimeCustomer',
        'callverStatus_id',
        'technicians_id',
        'idRequired',
        'problemsolution_id',
        'confirmAppointment',
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


    public function building()
    {
        return $this->hasOne('App\Models\Building', 'id', 'building_id');
    }

    public function callver()
    {
        return $this->hasOne('App\Models\Callver', 'id', 'callver_id');
    }

    public function callverstatus()
    {
        return $this->hasOne('App\Models\Callverstatus', 'id', 'callverStatus_id');
    }

    public function technicians()
    {
        return $this->hasOne('App\Models\Technician', 'id', 'technicians_id');
    }

    public function problemSolution()
    {
        return $this->hasOne('App\Models\Problemsolution', 'id', 'problemsolution_id');
    }
}
