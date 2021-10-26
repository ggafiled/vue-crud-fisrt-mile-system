<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Contractor extends Model
{
    protected $fillable = [
        'id',
        'building_id',
        'customer_id',
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

    public function customer()
    {
        return $this->hasOne('App\Models\Planing', 'id', 'customer_id');
    }
}
