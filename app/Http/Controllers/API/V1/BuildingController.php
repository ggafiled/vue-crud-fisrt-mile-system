<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Building;
use Illuminate\Http\Request;
use Exception;


class Buildingcontroller extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('role:superadministrator|administrator|user')->only(['index']);
        $this->middleware('role:superadministrator|administrator')->only(['store', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buidings = Building::all();
        return $this->sendResponse($buidings, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError($buidings, trans('actions.get.failed'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $buidings = Building::create([
                'saleFm_id' => $request->input('saleFm_id'),
                'paymentType_id' => $request->input('paymentType_id'),
                'areas_id' => $request->input('areas_id'),
                'bbns_id' => $request->input('bbns_id'),
                'area3bb_id' => $request->input('area3bb_id'),
                'areaTrue_id' => $request->input('areaTrue_id'),
                'areaAis_id' => $request->input('areaAis_id'),
                'areaFibernet_id' => $request->input('areaFibernet_id'),
                'workTime_id' => $request->input('workTime_id'),
                'projectName' => $request->input('projectName'),
                'buildingSum' => $request->input('buildingSum'),
                'floorSum' => $request->input('floorSum'),
                'roomSum' => $request->input('roomSum'),
                'fmCode' => $request->input('fmCode'),
                'roadName' => $request->input('roadName'),
                'nameManager' => $request->input('nameManager'),
                'phoneManager' => $request->input('phoneManager'),
                'mailManager' => $request->input('mailManager'),
                'nameNiti' => $request->input('nameNiti'),
                'phoneNiti' => $request->input('phoneNiti'),
                'mailNiti' => $request->input('mailNiti'),
                'houseNumber' => $request->input('houseNumber'),
                'squadNumber' => $request->input('squadNumber'),
                'alleyName' => $request->input('alleyName'),
                'roadName' => $request->input('roadName'),
                'districtName' => $request->input('districtName'),
                'provinceName' => $request->input('provinceName'),
                'countyName' => $request->input('countyName'),
                'postalCode' => $request->input('postalCode'),
                'longitude' => $request->input('longitude'),
                'latitude' => $request->input('latitude'),
                'contractDate' => $request->input('contractDate'),
                'contractDateEnd' => $request->input('contractDateEnd'),
                'condition' => $request->input('condition'),
                'contractPeriod' => $request->input('contractPeriod'),
                'reNewContact' => $request->input('reNewContact'),
                'balance' => $request->input('balance'),
                'areaTrueNew' => $request->input('areaTrueNew')
            ]);
            return $this->sendResponse($buidings, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($buidings, trans('actions.created.failed'));
        }
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
        try {
            $buildings = Building::find($id);
            $buildings->update($request->all());
            return $this->sendResponse($buildings, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($buildings, trans('actions.updated.failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $building = Building::find($id);
            $building->delete();
            return $this->sendResponse($building, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError($building, trans('actions.created.failed'));
        }
    }
}
