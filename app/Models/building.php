<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    protected $fillable = [
        'fmCode',
        'member_id',
        'buildingName',
        'detailAdress',
        'province',
        'city',
        'postalCode',
        'zone',
        'area',
        'townNumber',
        'floor',
        'roomNumber',
        'contract',
        'contractTime',
        'latitude',
        'longtude',
        'priceSquare',
        'workingTime',
        'blance',
        'developer',
        'grade',
    ];

    public function member()
	{
		return $this->hasMany('App\Models\Member','id','member_id');
	}

    public function progress()
	{
		return $this->belongsTo('App\Models\Progress','building_id','id');
	}

    public function constarution()
	{
		return $this->belongsTo('App\Models\Constarution','building_id','id');
	}
}