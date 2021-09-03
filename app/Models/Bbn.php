<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bbn extends Model
{
    use HasFactory,SoftDeletes;
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
        return $this->hasOne('App\Models\Building', 'bbns_id', 'id');
    }
}
