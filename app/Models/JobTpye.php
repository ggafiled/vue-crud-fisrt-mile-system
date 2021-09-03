<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTpye extends Model
{
    protected $fillable = [
        'id',
        'jobType',
    ];

    public function jobtype()
    {
        return $this->hasOne('App\Models\Planing', 'isp_id', 'id');
    }
}
