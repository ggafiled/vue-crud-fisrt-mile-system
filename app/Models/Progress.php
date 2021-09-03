<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Progress extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = [
        'id',
        'building_id',
        'fmProgress_id',
        'totProgress_id',
        'progress3bb_id',
        'sinetProgress_id',
        'fnProgress_id',
        'trueProgress_id',
        'dateFm',
        'dateTot',
        'dateAis',
        'date3BB',
        'dateSinet',
        'dateFn',
        'dateTrue',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}")
        ->useLogName('progress')
        ->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    public function non_contract() {
        return $this->building()->where('spendSpace','=', 'ยังไม่ได้ทำสัญญา');
    }
    public function building()
	{
		return $this->hasOne('App\Models\Building','id','building_id');
	}

    public function fmProgress()
    {
        return $this->belongsTo('App\Models\Generatingaction', 'fmProgress_id', 'id');
    }

    public function totProgress()
    {
        return $this->belongsTo('App\Models\Generatingaction', 'totProgress_id', 'id');
    }

    public function progress3bb()
    {
        return $this->belongsTo('App\Models\Generatingaction', 'progress3bb_id', 'id');
    }

    public function sinetProgress()
    {
        return $this->belongsTo('App\Models\Generatingaction', 'sinetProgress_id', 'id');
    }

    public function fnProgress()
    {
        return $this->belongsTo('App\Models\Generatingaction', 'fnProgress_id', 'id');
    }

    public function trueProgress()
    {
        return $this->belongsTo('App\Models\Generatingaction', 'trueProgress_id', 'id');
    }

}
