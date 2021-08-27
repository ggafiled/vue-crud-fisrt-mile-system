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
        'projectName',
        'fmProgress',
        'dateFm',
        'totProgress',
        'dateTot',
        'aisProgress',
        'dateAis',
        'progress3bb',
        'date3BB',
        'sinetProgress',
        'dateSinet',
        'fnProgress',
        'dateFn',
        'trueProgress',
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

}
