<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Resources\AreaResource;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return AreaResource::collection($areas);
    }
}
