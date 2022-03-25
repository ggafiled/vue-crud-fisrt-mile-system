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
        'surname',
        'tel',
        'tel2',
        'email',
        'status',
        'remark',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // public function zone()
    // {
    //     return $this->belongsTo('App\Models\zone', 'id', 'teamZone_id');
    // }
}
