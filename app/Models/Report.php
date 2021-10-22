<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
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
