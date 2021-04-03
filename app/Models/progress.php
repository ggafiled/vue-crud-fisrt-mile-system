<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $fillable = [
        'id','buildingId','fmProgress','dateProgress',
        'totProgress','totDate',
        'aisProgress','aisDate',
        'Progress3bb','Date3bb',
        'sinetProgress','sinetDate',
        'fnProgress','fnDate',
        'trueProgress','trueDate',
        'update_at'
    ];
}