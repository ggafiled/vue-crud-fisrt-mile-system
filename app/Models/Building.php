<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Building extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'saleFm_id',
        'paymentType_id',
        'areas_id',
        'bbns_id',
        'area3bb_id',
        'areaTrue_id',
        'areaAis_id',
        'areaFibernet_id',
        'workTime_id',
        'projectName',
        'buildingSum',
        'floorSum',
        'roomSum',
        'fmCode',
        'roadName',
        'nameManager',
        'phoneManager',
        'mailManager',
        'nameNiti',
        'phoneNiti',
        'mailNiti',
        'houseNumber',
        'squadNumber',
        'alleyName',
        'roadName',
        'districtName',
        'provinceName',
        'countyName',
        'postalCode',
        'longitude',
        'latitude',
        'contractDate',
        'contractDateEnd',
        'condition',
        'contractPeriod',
        'reNewContact',
        'balance',
        'areaTrueNew',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName}")
            ->useLogName('building')
            ->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    public function progress()
    {
        return $this->hasOne('App\Models\Progress', 'building_id', 'id');
    }

    public function constarution()
    {
        return $this->belongsTo('App\Models\Constarution', 'building_id', 'id');
    }

    public function planning()
    {
        return $this->belongsTo('App\Models\planning', 'building_id', 'id');
    }

    public function get_building()
    {
        return $this->building()->where('building_id');
    }

    public function salefm()
    {
        return $this->belongsTo('App\Models\Salefm', 'saleFm_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo('App\Models\Payment', 'paymentType_id', 'id');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area', 'areas_id', 'id');
    }

    public function bbn()
    {
        return $this->belongsTo('App\Models\BBn', 'bbns_id', 'id');
    }

    public function area3bb()
    {
        return $this->belongsTo('App\Models\Area3bb', 'area3bb_id', 'id');
    }

    public function areaTrue()
    {
        return $this->belongsTo('App\Models\areaTrue', 'areaTrue_id', 'id');
    }

    public function areaAis()
    {
        return $this->belongsTo('App\Models\AreaAis', 'areaAis_id', 'id');
    }

    public function areaFibernet()
    {
        return $this->belongsTo('App\Models\areaFibernet', 'areaFibernet_id', 'id');
    }

    public function worktime()
    {
        return $this->belongsTo('App\Models\WorkTime', 'workTime_id', 'id');
    }
}
