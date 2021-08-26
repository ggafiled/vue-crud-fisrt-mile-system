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
        'paymentType'
    ];

    public function building()
	{
		return $this->hasOne('App\Models\Building','payment_id','id');
	}
}
