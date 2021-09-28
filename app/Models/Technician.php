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
        'ais',
        'true',
    ];

    public function technician()
    {
        return $this->hasMany('App\Models\Planing', 'technician_id', 'id');
    }

    // public function building()
    // {
    //     return $this->hasMany('App\Models\Building', 'technician_id', 'id');
    // }
}
