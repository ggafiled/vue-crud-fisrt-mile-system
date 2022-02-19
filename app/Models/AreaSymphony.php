<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AreaSymphony extends Model
{
    protected $fillable = [
        'id',
        'AreaSymphony'
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\AreaSymphony', 'id', 'areaSyphony_id');
    }

}
