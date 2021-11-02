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
        // 'technician_id',
        'areas_id',
        'bbns_id',
        'area3bb_id',
        'areaAis_id',
        'areaTrue_id',
        'areaTrueNew_id',
        'areaFibernet_id',
        'projectName',
        'subBuildingsum',
        'floorSum',
        'roomSum',
        'nameManager',
        'phoneManager',
        'mailManager',
        'nameNiti',
        'phoneNiti',
        'mailNiti',
        'nameTechnician',
        'phoneTechnician',
        'mailTechnician',
        'houseNumber',
        'squadNumber',
        'alleyName',
        'roadName',
        'districtName',
        'provinceName',
        'countyName',
        'postalCode',
        'latitude',
        'longitude',
        'contractStartDate',
        'paymentType_id',
        'saleFm_id',
        'contractTerm',
        'contractEndDate',
        'balance',
        'remarkContract',
        'workTime_id',
        'remark',
        'statusBuilding',
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

    public function subbuilding()
    {
        return $this->hasMany('App\Models\SubBuilding', 'building_id', 'id');
    }

    public function progress()
    {
        return $this->hasOne('App\Models\Progress', 'building_id', 'id');
    }

    public function constarution()
    {
        return $this->hasOne('App\Models\Constarution', 'building_id', 'id');
    }

    public function planning()
    {
        return $this->belongsTo('App\Models\Planning', 'building_id', 'id');
    }

    public function contractor()
    {
        return $this->belongsTo('App\Models\Contractor', 'building_id', 'id');
    }

    public function Accountant()
    {
        return $this->belongsTo('App\Models\Accountant', 'building_id', 'id');
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
        return $this->hasOne('App\Models\Bbn', 'id', 'bbns_id');
    }

    public function area3bb()
    {
        return $this->hasOne('App\Models\Area3bb', 'id', 'area3bb_id');
    }

    public function areaTrue()
    {
        return $this->hasOne('App\Models\AreaTrue', 'id', 'areaTrue_id');
    }

    public function areaTrueNew()
    {
        return $this->hasOne('App\Models\AreaTrueNew', 'id', 'areaTrueNew_id');
    }

    public function areaAis()
    {
        return $this->hasOne('App\Models\AreaAis', 'id', 'areaAis_id');
    }

    public function areaFibernet()
    {
        return $this->hasOne('App\Models\AreaFiberNet', 'id', 'areaFibernet_id');
    }

    public function workTime()
    {
        return $this->hasOne('App\Models\WorkTime', 'id', 'workTime_id');
    }

    public function areaTechnician()
    {
        return $this->hasOne('App\Models\Technician', 'id', 'technician_id');
    }
}
