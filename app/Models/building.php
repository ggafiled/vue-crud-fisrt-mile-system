<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'buildingId',
        'fmCode', 'contactName', 'phone', 'email',
        'area', 'floor', 'roomNumber', 'numberLayer',
        'detailAdress', 'province', 'city', 'postalCode',
        'latitude', 'longtude', 'priceSquare', 'workingTime',
        'blance', 'developer', 'grade', 'note'
    ];
}
