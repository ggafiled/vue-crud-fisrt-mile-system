<?php

namespace App\Models;

use Laratrust\Models\LaratrustTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends LaratrustTeam
{
    use HasFactory;
    public $guarded = [];

    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User','role_user');
    }
}
