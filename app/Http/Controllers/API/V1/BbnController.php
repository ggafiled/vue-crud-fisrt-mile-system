<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Resources\BbnResource;
use App\Models\Bbn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BbnController extends Controller
{
    public function index()
    {
        $area_id = request('area_id');
        // return $area_id;

        $sections = Bbn::where('area_id',$area_id)->get();
        return BbnResource::collection($sections);
    }
}
