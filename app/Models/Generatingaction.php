<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generatingaction extends Model
{
    protected $fillable = [
        'id',
        'status'
    ];

    public function progressFm()
    {
        return $this->belongsTo('App\Models\Progress', 'fmProgress_id', 'id');
    }

    public function progressAis()
    {
        return $this->belongsTo('App\Models\Progress', 'aisProgress_id', 'id');
    }

    public function progressTot()
    {
        return $this->belongsTo('App\Models\Progress', 'totProgress_id', 'id');
    }

    public function progress3bb()
    {
        return $this->belongsTo('App\Models\Progress', 'progress3bb_id', 'id');
    }

    public function sinetProgress()
    {
        return $this->belongsTo('App\Models\Progress', 'sinetProgress_id', 'id');
    }

    public function fnProgress()
    {
        return $this->belongsTo('App\Models\Progress', 'fnProgress_id', 'id');
    }

    public function trueProgress()
    {
        return $this->belongsTo('App\Models\Progress', 'trueProgress_id', 'id');
    }

    public function txrxProgress()
    {
        return $this->belongsTo('App\Models\Progress', 'txrtProgress_id', 'id');
    }

    public function ifcc()
    {
        return $this->belongsTo('App\Models\Constarution', 'ifcc_id', 'id');
    }

    public function surveyDesing()
    {
        return $this->belongsTo('App\Models\Constarution', 'surveyDesing_id', 'id');
    }

    public function wallBox()
    {
        return $this->belongsTo('App\Models\Constarution', 'wallBox_id', 'id');
    }

    public function microductD()
    {
        return $this->belongsTo('App\Models\Constarution', 'microductD_id', 'id');
    }

    public function microductK()
    {
        return $this->belongsTo('App\Models\Constarution', 'microductK_id', 'id');
    }

    public function fiberConvertion()
    {
        return $this->belongsTo('App\Models\Constarution', 'fiberConvertion_id', 'id');
    }
}