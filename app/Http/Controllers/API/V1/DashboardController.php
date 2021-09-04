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
                    'FM Progress' => DB::table('progress')
                        ->select('fmProgress_id as name', DB::raw('count(*) as total'))
                        ->where('fmProgress_id', '!=', '')
                        ->groupBy('fmProgress_id')
                        ->get(),
                    'TOT Progress' => DB::table('progress')
                        ->select('totProgress_id as name', DB::raw('count(*) as total'))
                        ->where('totProgress_id', '!=', '')
                        ->groupBy('totProgress_id')
                        ->get(),
                    'AIS Progress' => DB::table('progress')
                        ->select('aisProgress_id as name', DB::raw('count(*) as total'))
                        ->where('aisProgress_id', '!=', '')
                        ->groupBy('aisProgress_id')
                        ->get(),
                    '3BB Progress' => DB::table('progress')
                        ->select('progress3bb_id as name', DB::raw('count(*) as total'))
                        ->where('progress3bb_id', '!=', '')
                        ->groupBy('progress3bb_id')
                        ->get(),
                    'SINET Progress' => DB::table('progress')
                        ->select('sinetProgress_id as name', DB::raw('count(*) as total'))
                        ->where('sinetProgress_id', '!=', '')
                        ->groupBy('sinetProgress_id')
                        ->get(),
                    'FN Progress' => DB::table('progress')
                        ->select('fnProgress_id as name', DB::raw('count(*) as total'))
                        ->where('fnProgress_id', '!=', '')
                        ->groupBy('fnProgress_id')
                        ->get(),
                    'TRUE Progress' => DB::table('progress')
                        ->select('trueProgress_id as name', DB::raw('count(*) as total'))
                        ->where('trueProgress_id', '!=', '')
                        ->groupBy('trueProgress_id')
                        ->get(),
                    // 'FM Progress' => [10,5,4,7,8,6,3],
                    // 'TOT Progress' => [10,5,4,7,8,6,3],
                    // 'AIS Progress' => [10,5,4,7,8,6,3],
                    // '3BB Progress' => [10,5,4,7,8,6,3],
                    // 'SINET Progress' => [10,5,4,7,8,6,3],
                    // 'FN Progress' => [10,5,4,7,8,6,3],
                    // 'TRUE Progress' => [10,5,4,7,8,6,3],
                ],
            ];
            return $this->sendResponse($dashboard, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($dashboard, trans('actions.created.failed'));
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
