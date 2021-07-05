<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'projectName',
        'fmProgress',
        'dateFm',
        'totProgress',
        'dateTot',
        'aisProgress',
        'dateAis',
        'progress3bb',
        'date3BB',
        'sinetProgress',
        'dateSinet',
        'fnProgress',
        'dateFn',
        'trueProgress',
        'dateTrue',
    ];

    public function building()
	{
		return $this->hasMany('App\Models\Building','id','building_id');
	}
}
