<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AreaTxrx extends Model
{
    protected $fillable = [
        'id',
        'areaTxrx'
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\AreaTxrx', 'id', 'areaTxrx_id');
    }
}
