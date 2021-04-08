<?php

namespace App\Models;

use Laratrust\Models\LaratrustTeam;

class Team extends LaratrustTeam
{
    public $guarded = [];

    protected $fillable = [
        'name', 'display_name', 'description'
    ];
}
