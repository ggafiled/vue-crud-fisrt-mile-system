<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planing extends Model
{
    use HasFactory;
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

    public function users()
    {
        return $this->belongsToMany('App\Models\User','role_user');
    }
}