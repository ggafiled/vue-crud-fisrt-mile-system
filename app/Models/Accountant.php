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
        'planning_id',
        'statusContrater',
        'dateConnect',
        'dateDisconnect',
        'workSheet',
        'reMarkAccount',
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\Planing', 'planning_id', 'id');
    }

    public function accountant()
    {
        return $this->belongsTo('App\Models\Planing', 'planning_id', 'id');
    }

}
