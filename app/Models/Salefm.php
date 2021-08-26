<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Salefm extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'nameSale'
    ];

    public function building()
	{
		return $this->hasOne('App\Models\Building','nameSale_id','id');
	}
}
