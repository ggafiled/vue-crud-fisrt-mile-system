<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function ifccc()
    {
        return $this->belongsTo('App\Models\Constarution', 'ifccStatus_id', 'id');
    }

    public function microduct()
    {
        return $this->belongsTo('App\Models\Constarution', 'microductStatus_id', 'id');
    }

    public function fiberBlow()
    {
        return $this->belongsTo('App\Models\Constarution', 'fiberBlowStatus_id', 'id');
    }

    public function splice()
    {
        return $this->belongsTo('App\Models\Constarution', 'spliceStatus_id', 'id');
    }

}