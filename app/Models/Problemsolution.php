<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Problemsolution extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'problemSolution'
    ];

    public function planing()
	{
		return $this->hasOne('App\Models\Planing','problemsolution_id','id');
	}
}
