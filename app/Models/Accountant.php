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
        'customer_id',
        'statusContrater',
        'dateConnect',
        'dateDisconnect',
        'workSheet',
        'reMarkAccount',
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
