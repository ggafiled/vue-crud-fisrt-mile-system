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
        return $this->belongsTo('App\Models\Area3bb', 'id', 'area3bb_id');
    }
}