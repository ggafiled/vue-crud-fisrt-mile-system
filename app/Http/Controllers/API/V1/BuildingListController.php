<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Building;
use App\Models\Progress;
use Exception;
use Illuminate\Http\Request;

class BuildingListController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('role:superadministrator|administrator|user')->only(['index', 'create']);
        $this->middleware('role:superadministrator|administrator')->only(['store', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $buildings = Building::with(
                'progress.fmProgress',
                'progress.totProgress',
                'progress.aisProgress',
                'progress.Progress3bb',
                'progress.trueProgress',
                'constarution',
                'saleFm:id,nameSale as name',
                'paymentType:id,paymentType as name',
                'areas:id,name',
                'bbns:id,name',
                'area3bb:id,area3BB as name',
                'areaTrue:id,areaTrue as name',
                'areaTrueNew:id,areaTrueNew as name',
                'areaAis:id,areaAis as name',
                'areaFibernet:id,areaFibernet as name',
                'areaTxrx:id,areaTxrx as name',
                'areaSymphony:id,areaSymphony as name',
                'contractTerm:id,contractTerm as name',
                'workTime:id,worktime as name'
            )->get();
            return $this->sendResponse($buildings, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([$ex], trans('actions.get.failed'));
        }
    }

    public function nonContract()
    {
        try {
            $buildings_non_contract = Progress::whereHas('building', function ($query) {
                $query->where('spendSpace', '=', 'ยังไม่ทำสัญญา');
            })->with('building')->get();
            return $this->sendResponse($buildings_non_contract, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.created.failed'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
