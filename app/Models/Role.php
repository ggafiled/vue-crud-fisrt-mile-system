<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Role extends LaratrustRole
{

    use LogsActivity;

    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('role.logs')
        ->setDescriptionForEvent(fn(string $eventName) => "This record has been {$eventName}")
        ->logOnly(['name', 'display_name','description'])
        ->logOnlyDirty();
        // Chain fluent methods for configuration options
    }
}