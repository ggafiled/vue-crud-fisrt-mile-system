<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'paymentType',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
