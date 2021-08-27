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
        'area3BB_id',
        'areaAis_id',
        'areaFiberNet_id',
        'areaTrue_id',
        'workTime_id',
        'salefm_id',
        'payment_id',
        'operater_id',
        'providertrue_id',
        'teamserway_id',
        'projectName',
        'buildingSum',
        'floorSum',
        'roomSum',
        'fmCode',
        'nameNiti',
        'phoneNiti',
        'mailNiti',
        'nameManager',
        'phoneManager',
        'mailManager',
        'houseNumber',
        'squadNumber',
        'alleyName',
        'roadName',
        'districtName',
        'countyName',
        'provinceName',
        'postalCode',
        'longitude',
        'latitude',
        'contractSell',
        'contractDate',
        'contractDateEnd',
        'spendSpace',
        'contractPeriod',
        'reNewContact',
        'areaN',
        'bbN',
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

    public function area3bb()
    {
        return $this->hasOne('App\Models\Area3BB', 'id', 'area3BB_id');
    }

    public function areaAis()
    {
        return $this->hasOne('App\Models\AreaAis', 'id', 'areaAis_id');
    }

    public function areaFiberNet()
    {
        return $this->hasOne('App\Models\AreaFiberNet', 'id', 'areaFibetNet_id');
    }

    public function areaTrue()
    {
        return $this->hasOne('App\Models\AreaTrue', 'id', 'areaTrue_id');
    }

    public function workTime()
    {
        return $this->hasOne('App\Models\Worktime', 'id', 'workTime_id');
    }

    public function Salefm()
    {
        return $this->hasOne('App\Models\Salefm', 'id', 'salefm_id');
    }

    public function Payment()
    {
        return $this->hasOne('App\Models\Payment', 'id', 'payment_id');
    }

    public function Operater()
    {
        return $this->hasOne('App\Models\Operter', 'id', 'operater_id');
    }

    public function Providertrue()
    {
        return $this->hasOne('App\Models\Providertrue', 'id', 'providertrue_id');
    }

    public function Teamserway()
    {
        return $this->hasOne('App\Models\Teamserway', 'id', 'teamserway_id');
    }
}
