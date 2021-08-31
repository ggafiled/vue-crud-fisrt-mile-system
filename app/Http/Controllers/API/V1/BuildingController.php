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
        $buidings = Building::all();
        return $this->sendResponse($buidings, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError($buidings, trans('actions.get.fialed'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'projectName' => $request->input('projectName'),
                'areaN' => $request->input('areaN'),
                'bbN' => $request->input('bbN'),
                'area3BB' => $request->input('area3BB'),
                'areaTrue' => $request->input('areaTrue'),
                'areaTrueNew' => $request->input('areaTrueNew'),
                'areaAis' => $request->input('areaAis'),
                'areaFiberNet' => $request->input('areaFiberNet'),
                'buildingSum' => $request->input('buildingSum'),
                'floorSum' => $request->input('floorSum'),
                'roomSum' => $request->input('roomSum'),
                'fmCode' => $request->input('fmCode'),
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
                'countyName' => $request->input('countyName'),
                'provinceName' => $request->input('provinceName'),
                'postalCode' => $request->input('postalCode'),
                'longitude' => $request->input('longitude'),
                'latitude' => $request->input('latitude'),
                'contractSell' => $request->input('contractSell'),
                'contractDate' => $request->input('contractDate'),
                'contractDateEnd' => $request->input('contractDateEnd'),
                'spendSpace' => $request->input('spendSpace'),
                'condition' => $request->input('condition'),
                'contractPeriod' => $request->input('contractPeriod'),
                'reNewContact' => $request->input('reNewContact'),
                'balance' => $request->input('balance'),
                'operatingTime' => $request->input('operatingTime')
            ]);
            return $this->sendResponse($buidings, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($buidings, trans('actions.created.fialed'));
        }
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
        try {
            $buildings = Building::find($id);
            $buildings->update($request->all());
            return $this->sendResponse($buildings, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($buildings, trans('actions.updated.fialed'));
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
            return $this->sendError($building, trans('actions.destroy.fialed'));
        }
    }
}