<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planing extends Model
{
    protected $fillable = [
        'building_id','isp','ispCode','fees','confirming','teams_id','remark','date','time','status','subStatus','dataConnect','dataDisconnect',
    ];
}