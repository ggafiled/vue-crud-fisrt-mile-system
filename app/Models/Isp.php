<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isp extends Model
{
    protected $fillable = [
        'id',
        'isp',
        'isps_color',
        'isps_map_icon'
    ];

    public function isp()
    {
        return $this->hasOne('App\Models\Planing', 'isp_id', 'id');
    }

    public function ispId()
    {
        return $this->hasOne('App\Models\Planing', 'ispId_id', 'id');
    }
}