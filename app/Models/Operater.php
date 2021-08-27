<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Operater extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'operaterName'
    ];

    public function building()
	{
		return $this->hasOne('App\Models\Building','operater_id','id');
	}
}
