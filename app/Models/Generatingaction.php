<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generatingaction extends Model
{
    protected $fillable = [
        'id',
        'status',

    ];

    public function progressFm()
    {
        return $this->hasOne('App\Models\Progress', 'fmProgress_id', 'id');
    }

    public function progressAis()
    {
        return $this->hasOne('App\Models\Progress', 'aisProgress_id', 'id');
    }

    public function progressTot()
    {
        return $this->hasOne('App\Models\Progress', 'totProgress_id', 'id');
    }

    public function progress3bb()
    {
        return $this->hasOne('App\Models\Progress', 'progress3bb_id', 'id');
    }

    public function sinetProgress()
    {
        return $this->hasOne('App\Models\Progress', 'sinetProgress_id', 'id');
    }

    public function fnProgress()
    {
        return $this->hasOne('App\Models\Progress', 'fnProgress_id', 'id');
    }

    public function trueProgress()
    {
        return $this->hasOne('App\Models\Progress', 'trueProgress_id', 'id');
    }

    public function ifcc()
    {
        return $this->hasOne('App\Models\Constarution', 'ifcc_id', 'id');
    }

    public function surveyDesing()
    {
        return $this->hasOne('App\Models\Constarution', 'surveyDesing_id', 'id');
    }

    public function wallBox()
    {
        return $this->hasOne('App\Models\Constarution', 'wallBox_id', 'id');
    }

    public function microductD()
    {
        return $this->hasOne('App\Models\Constarution', 'microductD_id', 'id');
    }

    public function microductK()
    {
        return $this->hasOne('App\Models\Constarution', 'microductK_id', 'id');
    }

    public function fiberConvertion()
    {
        return $this->hasOne('App\Models\Constarution', 'fiberConvertion_id', 'id');
    }
}


