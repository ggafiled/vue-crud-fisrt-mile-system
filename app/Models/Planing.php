<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planing extends Model
{
    protected $fillable = [
        'name', 'lastName', 'phoneNumber1', 'phoneNumber2', 'buildingId',
        'numberLayer', 'floor', 'roomNumber',    'isp', 'ispCode', 'memberNumber',
        'Fees', 'confirming', 'Team',    'date',    'time',    'status', 'subStatus',
        'dateConnect', 'dateDisconnect', 'update_at'
    ];
}
