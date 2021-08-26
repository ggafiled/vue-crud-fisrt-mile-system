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
        'projectNameTot',
        'projectName3bb',
        'projectNameTrue',
        'projectNameAis',
        'projectNameFiberNet',
        'desingBy',
        'surveyDesing',
        'surveyDesingDate',
        'ifcc',
        'ifccDate',
        'wallBox',
        'wallBoxDate',
        'type',
        'microductD',
        'microductDateD',
        'microductK',
        'microductDateK',
        'fiberConvertion',
        'fiberConvertionDateD',
        'blow',
        'splice'
    ];

    public function building()
    {
        return $this->hasMany('App\Models\Building', 'id', 'building_id');
    }
}
