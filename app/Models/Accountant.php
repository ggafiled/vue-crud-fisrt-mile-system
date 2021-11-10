<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Accountant extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'building_id',
        'statusContrater',
        'dateConnect',
        'dateDisconnect',
        'workSheet',
        'reMarkAccount',
    ];

    public function building()
    {
        return $this->hasMany('App\Models\Building', 'building_id', 'id');
    }

}
