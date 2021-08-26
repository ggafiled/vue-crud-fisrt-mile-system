<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Planing;

class PlaningController extends BaseController{

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('role:superadministrator|administrator')->only(['create','store','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Planing = Planing::with('building')->get();
        return $this->sendResponse($Planing,'planing List');
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
        $Planing = new Planing([
            'building_id' => $request->input('building_id'),
            'technician_id' => $request->input('technician_id'),
            'problemsolution_id' => $request->input('problemsolution_id'),
            'teamtechnician_id' => $request->input('teamtechnician_id'),
            'callver_id' => $request->input('callver_id'),
            'callverstatus_id' => $request->input('callverstatus_id'),
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'tel' => $request->input('tel'),
            'tel2' => $request->input('tel2'),
            'theBuilding' => $request->input('theBuilding'),
            'floor' => $request->input('floor'),
            'room' => $request->input('room'),
            'isp' => $request->input('isp'),
            'agent' => $request->input('agent'),
            'circuit' => $request->input('circuit'),
            'entranceFee' => $request->input('entranceFee'),
            'jobType' => $request->input('jobType'),
            'appointmentDate' => $request->input('appointmentDate'),
            'appointmentTime' => $request->input('appointmentTime'),
            'technicianPlaning' => $request->input('technicianPlaning'),
            'idRequired' => $request->input('idRequired'),
            'status' => $request->input('status'),
            'subStatus' => $request->input('subStatus'),
            'reMark' => $request->input('reMark')
        ]);
        $Planing->save();

        return response()->json('Planing created!');
    }

    /**\
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
        $Planing = Planing::find($id);
        $Planing->update($request->all());

        return response()->json('Planing updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Planing = Planing::find($id);
        $Planing->delete();

        return response()->json('Planing deleted!');
    }
}
