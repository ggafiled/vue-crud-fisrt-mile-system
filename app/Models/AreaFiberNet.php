<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AreaFiberNet extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'areaFiberNet'
    ];

    public function building()
	{
		return $this->hasOne('App\Models\Building','areaFiberNet_id','id');
	}
}