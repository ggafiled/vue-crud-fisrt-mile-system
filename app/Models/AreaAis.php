<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AreaAis extends Model
{
    protected $fillable = [
        'id',
        'areaAis'
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\Building', 'id', 'areaAis_id');
    }
}