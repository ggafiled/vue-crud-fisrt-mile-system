<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Area3bb extends Model
{
    protected $fillable = [
        'id',
        'area3BB',
    ];

    public function building()
    {
        return $this->hasOne('App\Models\Area3bb', 'area3bb_id', 'id');
    }
}
