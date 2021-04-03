<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constarution extends Model
{
    protected $fillable = [
        'buildingId','numberLayer','roomNumber','floor',

        'exploreDesign','exploreDesignTeam','exploreDesignDate',

        'exploreDesignBy','exploreDesignDateBy',

        'ifcc','ifccTeam','ifccDate',

        'wallBox','wallBoxDate','wallBoxTeam',

        'microductD','microductTeamD','microductDateD',

        'microductK','microductTeamK','microductDateK',
    ];
}