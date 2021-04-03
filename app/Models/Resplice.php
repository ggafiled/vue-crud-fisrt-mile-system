<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resplice extends Model
{
    protected $fillable = [
        'buildingId','numberLayer','roomNumber',
        'floor','zone','technicianTeamStart',
        'startDate','planDate','planFinish',
        'planStart','planComplete','technicianTeamEnd'
    ];
}
