<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Planing extends Model
{
    use HasFactory,SoftDeletes;
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
        'technicianPlaning',
        'idRequired',
        'status',
        'subStatus',
        'reMark',
    ];

    public function building()
	{
		return $this->hasMany('App\Models\Building','id','building_id');
	}

}