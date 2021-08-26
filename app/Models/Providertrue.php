<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Providertrue extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'providerTrue'
    ];

    public function building()
	{
		return $this->hasOne('App\Models\Building','providertrue_id','id');
	}
}
