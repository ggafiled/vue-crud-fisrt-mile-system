<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'teamZone_id',
        'zoneName',
        'zoneTel',
        'zoneEmail',
    ];

    public function planning()
    {
        return $this->belongsTo('App\Models\Planing', 'id', 'zone_id');
    }

    public function planning2()
    {
        return $this->belongsTo('App\Models\Planing', 'id', 'zone_id2');
    }

    // public function teamzone()
    // {
    //     return $this->belongsTo('App\Models\TeamZone', 'id', 'teamZone_id');
    // }
    
}
