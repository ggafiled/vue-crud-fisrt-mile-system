<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Worktime extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'workTime'
    ];

    public function building()
    {
        return $this->hasOne('App\Models\Building', 'workTime_id', 'id');
    }
}
