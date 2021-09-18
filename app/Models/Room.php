<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','building_id', 'subbuilding_id'];

    function building()
    {
        return $this->hasOne('App\Models\Building', 'id', 'building_id');
    }

    function subbuilding()
    {
        return $this->hasOne('App\Models\SubBuilding', 'id', 'subbuilding_id');
    }
}