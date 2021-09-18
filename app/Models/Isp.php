<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Isp extends Model
{
    use LogsActivity;

    protected $fillable = [
        'id',
        'isp',
        'isps_color',
        'isps_map_icon'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName}")
            ->useLogName('isp')
            ->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    public function isp()
    {
        return $this->hasOne('App\Models\Planing', 'isp_id', 'id');
    }

    public function ispId()
    {
        return $this->hasOne('App\Models\Planing', 'ispId_id', 'id');
    }
}