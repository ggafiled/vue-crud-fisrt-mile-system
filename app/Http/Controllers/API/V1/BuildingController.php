<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Building;

class Buildingcontroller extends BaseController{


    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('role:superadministrator|administrator|user')->only(['index','create']);
        $this->middleware('role:superadministrator|administrator')->only(['store','update','destroy']);
    }

    /**
    * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $building = Building::all();
        return $this->sendResponse($building,'Building');
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
        $buidings = new Building([
            'projectName' => $request->input('projectName'),
            'projectNameTot' => $request->input('projectNameTot'),
            'projectName3bb' => $request->input('projectName3bb'),
            'projectNameTrue' => $request->input('projectNameTrue'),
            'projectNameAis' => $request->input('projectNameAis'),
            'projectNameFiberNet' => $request->input('projectNameFiberNet'),
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
            'areaN' => $request->input('areaN'),
            'bbN' => $request->input('bbN'),
            'area3BB' => $request->input('area3BB'),
            'areaTrue' => $request->input('areaTrue'),
            'areaTrueNew' => $request->input('areaTrueNew'),
            'areaAis' => $request->input('areaAis'),
            'areaFiberNet' => $request->input('areaFiberNet'),
            'operatingTime' => $request->input('operatingTime')
        ]);
        $buidings->save();
        return response()->json('buidings created!');
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
        $buildings = Building::find($id);
        $buildings->update($request->all());

        return response()->json('buildings updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $building = Building::find($id);
        $building->delete();

        return response()->json('building deleted!');
    }
}
