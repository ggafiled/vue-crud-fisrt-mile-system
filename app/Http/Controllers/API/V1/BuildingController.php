<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Building;
use Illuminate\Http\Request;
use Exception;
use Carbon;
use App\Http\Requests\Building\BuildingRequest;


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
        $buidings = Building::with(
                'saleFm:id,nameSale as name',
                'paymentType:id,paymentType as name',
                'areas:id,name', 'bbns:id,name',
                'area3bb:id,area3BB as name',
                'areaTrue:id,areaTrue as name',
                'areaTrueNew:id,areaTrueNew as name',
                'areaAis:id,areaAis as name',
                'areaFibernet:id,areaFibernet as name',
                'workTime:id,worktime as name')->get();
        return $this->sendResponse($buidings, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.failed'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuildingRequest $request)
    {
        try {
            $buidings = Building::create([
                // 'technician_id' => $request->input('technician_id'),
                'areas_id' => $request->input('areas_id'),
                'bbns_id' => $request->input('bbns_id'),
                'area3bb_id' => $request->input('area3bb_id'),
                'areaAis_id' => $request->input('areaAis_id'),
                'areaTrue_id' => $request->input('areaTrue_id'),
                'areaTrueNew_id' => $request->input('areaTrueNew_id'),
                'areaFibernet_id' => $request->input('areaFibernet_id'),
                'projectName' => $request->input('projectName'),
                'subBuildingsum' => $request->input('subBuildingsum'),
                'floorSum' => $request->input('floorSum'),
                'roomSum' => $request->input('roomSum'),
                'nameManager' => $request->input('nameManager'),
                'phoneManager' => $request->input('phoneManager'),
                'mailManager' => $request->input('mailManager'),
                'nameNiti' => $request->input('nameNiti'),
                'phoneNiti' => $request->input('phoneNiti'),
                'mailNiti' => $request->input('mailNiti'),
                'nameTechnician' => $request->input('nameTechnician'),
                'phoneTechnician' => $request->input('phoneTechnician'),
                'mailTechnician' => $request->input('mailTechnician'),
                'houseNumber' => $request->input('houseNumber'),
                'squadNumber' => $request->input('squadNumber'),
                'alleyName' => $request->input('alleyName'),
                'roadName' => $request->input('roadName'),
                'districtName' => $request->input('districtName'),
                'provinceName' => $request->input('provinceName'),
                'countyName' => $request->input('countyName'),
                'postalCode' => $request->input('postalCode'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'contractStartDate' => $request->input('contractStartDate'),
                'paymentType_id' => $request->input('paymentType_id'),
                'saleFm_id' => $request->input('saleFm_id'),
                'contractTerm' => $request->input('contractTerm'),
                'contractEndDate' => $request->input('contractEndDate'),
                // Carbon::parse($request->input("contractDateEnd")),
                'balance' => $request->input('balance'),
                'workTime_id' => $request->input('workTime_id'),
                'remark' => $request->input('remark'),
            ]);
            return $this->sendResponse($buidings, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.created.failed'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BuildingRequest $request, $id)
    {
        try {
            $buildings = Building::find($id);
            $buildings->update($request->all());
            return $this->sendResponse($buildings, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.updated.failed'));
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
            return $this->sendError([], trans('actions.destroy.failed'));
        }
    }
}
