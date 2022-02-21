<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Progress extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = [
        'id',
        'zone_id',
        'building_id',
        'constarution_id',
        'fmProgress_id',
        'totProgress_id',
        'aisProgress_id',
        'progress3bb_id',
        'txrtProgress_id',
        'fnProgress_id',
        'trueProgress_id',
        'symphonyProgress_id',
        'dateFm',
        'dateTot',
        'dateAis',
        'date3BB',
        'dateSinet',
        'dateFn',
        'dateTrue',
        'dateTxrx',
        'dateSymphony',
        'statusProgress'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName}")
            ->useLogName('progress')
            ->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    public function non_contract()
    {
        return $this->building()->where('spendSpace', '=', 'ยังไม่ได้ทำสัญญา');
    }
    public function building()
    {
        return $this->belongsTo('App\Models\Building', 'building_id', 'id');
    }

    public function constarution()
    {
        return $this->belongsTo('App\Models\Constarution', 'constarution_id', 'id');
    }

    public function fmProgress()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'fmProgress_id');
    }

    public function aisProgress()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'aisProgress_id');
    }

    public function totProgress()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'totProgress_id');
    }

    public function progress3bb()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'progress3bb_id');
    }

    public function sinetProgress()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'sinetProgress_id');
    }

    public function fnProgress()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'fnProgress_id');
    }

    public function trueProgress()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'trueProgress_id');
    }

    public function txrtProgress()
    {
        return $this->hasOne('App\Models\Generatingaction', 'id', 'txrtProgress_id');
    }

    public function zone()
    {
        return $this->hasOne('App\Models\Zone', 'id', 'zone_id');
    }
}