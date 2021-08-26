<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AreaTrue extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'areaTrue'
    ];

    public function building()
	{
		return $this->hasOne('App\Models\Building','areaTrue_id','id');
	}
}
