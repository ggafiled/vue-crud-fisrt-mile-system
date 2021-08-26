<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'teamTechnician',
        'phoneTechnician',
        'emailTechnician',
    ];

    public function planing()
	{
		return $this->hasOne('App\Models\Planing','technician_id','id');
	}
}