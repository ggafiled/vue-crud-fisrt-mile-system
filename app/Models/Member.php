<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'lastName',
        'phone1',
        'phone2',
        'province',
        'city',
        'detailAdress',
        'postalCode'
    ];

    public function building()
	{
		return $this->belongsTo('App\Models\Building','member_id','id');
	}
}