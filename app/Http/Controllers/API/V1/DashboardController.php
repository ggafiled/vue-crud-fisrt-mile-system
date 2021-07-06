<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Constarution;
use App\Models\progress;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //จะทำให้ดูอันเดียวจากนั้นถ้าจะเพิ่มก็เพิ่มใน array เอา
        $dashboard = [
            'building'=>Building::get()->count(),
            'constarution'=>Constarution::get()->count(),
            'progress'=>Progress::get()->count()
        ];

        return $this->sendResponse($dashboard, 'Dashboard Info');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

    }

    /**
     * Update the resource in storage
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {

    }
}
