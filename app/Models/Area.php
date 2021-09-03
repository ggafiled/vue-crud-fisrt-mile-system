<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\Building', 'id', 'areas_id');
    }
}