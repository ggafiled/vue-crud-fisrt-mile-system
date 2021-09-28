<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBuilding extends Model
{
    use HasFactory;

    protected $fillable = ["building_id", "projectName", "floorSum", "roomSum"];

    public function building()
    {
        return $this->belongsTo('App\Models\Building', 'id', 'building_id');
    }
}