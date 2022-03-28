<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamZone extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'zone_id',
        'name',
<<<<<<< HEAD
        // 'surname',
=======
        'surname',
>>>>>>> a851f1d1d36e11641d33720a955c1c0e15223a47
        'tel',
        'tel2',
        'email',
        'status',
        'remark',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // public function zone()
    // {
    //     return $this->belongsTo('App\Models\zone', 'id', 'teamZone_id');
    // }
}
