<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class resplice extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'building_id',
        'zone',
        'technicianTeamStart',
        'startDate',
        'planDate',
        'planFinish',
        'planStart',
        'planComplete',
        'taechincianTeamEnd',
    ];

    public function teams()
    {
        return $this->morphMany('App\Models\Team', 'teamable');
    }
}