<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Salefm extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'nameSale',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\Building', 'id', 'saleFm_id');
    }
}