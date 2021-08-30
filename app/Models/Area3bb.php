<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Area3bb extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'area3BB',
    ];

    public function building()
	{
		return $this->hasOne('App\Models\Building','area3BB_id','id');
	}
}