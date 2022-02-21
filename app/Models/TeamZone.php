<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamZone extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'zone_id',
        'name',
        'tel',
        'email',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // public function zone()
    // {
    //     return $this->belongsTo('App\Models\zone', 'id', 'teamZone_id');
    // }
}
