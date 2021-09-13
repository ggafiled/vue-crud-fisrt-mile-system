<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaTrueNew extends Model
{
    protected $fillable = [
        'id',
        'areaTrueNew'
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\AreaTrueNew', 'id', 'areaTrueNew_id');
    }

}