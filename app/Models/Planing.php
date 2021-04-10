<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mpociot\Teamwork\Traits\UsedByTeams;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Planing extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'building_id',
        'isp',
        'ispCode',
        'fees',
        'confirming',
        'team_id',
        'remark',
        'date',
        'time',
        'status',
        'subStatus',
        'dateConnect',
        'dateDisconnect',
    ];

    public function building()
	{
		return $this->hasMany('App\Models\Building','id','building_id');
	}

    public function teams()
	{
		return $this->hasMany('App\Models\Team','id','team_id');
	}
}