<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Constarution extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'building_id',
        'surveyDesing',
        'surveyDesingTeam',
        'surveyDesingDate',
        'surveyDesingDateBy',
        'surveyDesingBy',
        'ifcc',
        'ifccTeam',
        'ifccDate',
        'wallBox',
        'wallBoxTeam',
        'wallBoxDate',
        'microductD',
        'microductTeamD',
        'microductDateD',
        'microductK',
        'microductTeamK',
        'microductDateK',
    ];

    public function building()
	{
		return $this->hasMany('App\Models\Building','id','building_id');
	}
}