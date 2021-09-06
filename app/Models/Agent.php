<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'agentDetail'
    ];

    public function agentDetail()
    {
        return $this->hasOne('App\Models\Planing', 'agentDetail_id', 'id');
    }
}
