<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bbn extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'area_id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\Building', 'id', 'bbns_id');
    }
}