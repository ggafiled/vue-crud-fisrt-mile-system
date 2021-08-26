<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Callverstatus extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'callVerStatus'
    ];

    public function planing()
	{
		return $this->hasOne('App\Models\Planing','callverstatus_id','id');
	}
}