<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ContractTerm extends Model
{
    protected $fillable = [
        'id',
        'contractTerm'
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\ContractTerm', 'id', 'contractTerm_id');
    }
}