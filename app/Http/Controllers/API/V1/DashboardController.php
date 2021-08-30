<?php

namespace App\Http\Controllers\API\V1;

use Exception;
use App\Models\Building;
use App\Models\Constarution;
use App\Models\Progress;
use App\Models\user;
use DB;
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
        try {
            //จะทำให้ดูอันเดียวจากนั้นถ้าจะเพิ่มก็เพิ่มใน array เอา
            $dashboard = [
                'building' => Building::get()->count(),
                'constarution' => Constarution::get()->count(),
                'progress' => Progress::get()->count(),
                'user' => user::get()->count(),
                'planing' => 0,
                'chart_dp_groub_of_countyName' => DB::table('buildings')
                    ->select('countyName', DB::raw('count(*) as total'))
                    ->where('countyName', '!=', '')
                    ->groupBy('countyName')
                    ->get(),
                'chart_dp_groub_of_progress' => [
                    // 'FM Progress' => DB::table('progress')
                    //     ->select('fmProgress as name', DB::raw('count(*) as total'))
                    //     ->where('fmProgress', '!=', '')
                    //     ->groupBy('fmProgress')
                    //     ->get(),
                    // 'TOT Progress' => DB::table('progress')
                    //     ->select('totProgress as name', DB::raw('count(*) as total'))
                    //     ->where('totProgress', '!=', '')
                    //     ->groupBy('totProgress')
                    //     ->get(),
                    // 'AIS Progress' => DB::table('progress')
                    //     ->select('aisProgress as name', DB::raw('count(*) as total'))
                    //     ->where('aisProgress', '!=', '')
                    //     ->groupBy('aisProgress')
                    //     ->get(),
                    // '3BB Progress' => DB::table('progress')
                    //     ->select('progress3bb as name', DB::raw('count(*) as total'))
                    //     ->where('progress3bb', '!=', '')
                    //     ->groupBy('progress3bb')
                    //     ->get(),
                    // 'SINET Progress' => DB::table('progress')
                    //     ->select('sinetProgress as name', DB::raw('count(*) as total'))
                    //     ->where('sinetProgress', '!=', '')
                    //     ->groupBy('sinetProgress')
                    //     ->get(),
                    // 'FN Progress' => DB::table('progress')
                    //     ->select('fnProgress as name', DB::raw('count(*) as total'))
                    //     ->where('fnProgress', '!=', '')
                    //     ->groupBy('fnProgress')
                    //     ->get(),
                    // 'TRUE Progress' => DB::table('progress')
                    //     ->select('trueProgress as name', DB::raw('count(*) as total'))
                    //     ->where('trueProgress', '!=', '')
                    //     ->groupBy('trueProgress')
                    //     ->get(),
                    'FM Progress' => 4,
                    'TOT Progress' => 54,
                    'AIS Progress' => 33,
                    '3BB Progress' => 21,
                    'SINET Progress' => 8,
                    'FN Progress' => 12,
                    'TRUE Progress' => 54,
                ],
            ];
            return $this->sendResponse($dashboard, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($dashboard, trans('actions.get.fialed'));
        }
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