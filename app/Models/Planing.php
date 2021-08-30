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
        'technician',
        'problemsolution',
        'teamtechnician',
        'callver',
        'callverstatus',
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
}
