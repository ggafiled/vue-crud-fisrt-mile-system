<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resplice extends Model
{
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
}