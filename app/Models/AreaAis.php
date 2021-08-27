<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AreaAis extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'areaAis'
    ];

    public function building()
	{
		return $this->hasOne('App\Models\Building','areaAis_id','id');
	}
}
