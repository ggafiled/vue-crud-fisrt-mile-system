<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Callver extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'callVer'
    ];

    public function callver()
    {
        return $this->hasOne('App\Models\Planing', 'callver_id', 'id');
    }
}
