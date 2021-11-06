<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Accountant extends Model
{
    protected $fillable = [
        'id',
        'building_id',
        'statusContrater',
        'dateConnect',
        'dateDisconnect',
        'workSheet',
        'reMarkAccount',
    ];

}
