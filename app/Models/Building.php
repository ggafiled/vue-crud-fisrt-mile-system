<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Building extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
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

    // protected $appends = ['salefm', 'payment', 'area', 'bbn', 'area3bb', 'areaTrue', 'areaAis', 'areaFibernet', 'worktime'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName}")
            ->useLogName('building')
            ->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    public function get_building()
    {
        return $this->building()->where('building_id');
    }

    public function progress()
    {
        return $this->hasOne('App\Models\Progress', 'building_id', 'id');
    }

    public function constarution()
    {
        return $this->hasMany('App\Models\Constarution', 'id', 'building_id');
    }

    public function planning()
    {
        return $this->belongsTo('App\Models\planning', 'building_id', 'id');
    }

    public function saleFm()
    {
        return $this->hasOne('App\Models\Salefm', 'id', 'saleFm_id');
    }

    public function paymentType()
    {
        return $this->hasOne('App\Models\Payment', 'id', 'paymentType_id');
    }

    public function areas()
    {
        return $this->hasOne('App\Models\Area', 'id', 'areas_id');
    }

    public function bbns()
    {
        return $this->hasOne('App\Models\BBn', 'id', 'bbns_id');
    }

    public function area3bb()
    {
        return $this->hasOne('App\Models\Area3bb', 'id', 'area3bb_id');
    }

    public function areaTrue()
    {
        return $this->hasOne('App\Models\AreaTrue', 'id', 'areaTrue_id');
    }

    public function areaAis()
    {
        return $this->hasOne('App\Models\AreaAis', 'id', 'areaAis_id');
    }

    public function areaFibernet()
    {
        return $this->hasOne('App\Models\AreaFibernet', 'id', 'areaFibernet_id');
    }

    public function workTime()
    {
        return $this->hasOne('App\Models\WorkTime', 'id', 'workTime_id');
    }
}
