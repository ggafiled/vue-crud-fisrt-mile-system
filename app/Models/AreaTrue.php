<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AreaTrue extends Model
{
    protected $fillable = [
        'id',
        'areaTrue'
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\Building', 'id', 'areaTrue_id');
    }

}