<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Planing;
use Exception;

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

        try {
            $planing = new Planing([
            'building_id' => $request->input('building_id'),
            'isp_id' => $request->input('isp_id'),
            'jobtype_id' => $request->input('jobtype_id'),
            'technician_id' => $request->input('technician_id'),
            'callver_id' => $request->input('callver_id'),
            'callverstatus_id' => $request->input('callverstatus_id'),
            'ispId_id' => $request->input('ispId_id'),
            'problemsolution_id' => $request->input('problemsolution_id'),
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'tel' => $request->input('tel'),
            'tel2' => $request->input('tel2'),
            'theBuilding' => $request->input('theBuilding'),
            'floor' => $request->input('floor'),
            'room' => $request->input('room'),
            'agent' => $request->input('agent'),
            'circuit' => $request->input('circuit'),
            'entranceFee' => $request->input('entranceFee'),
            'appointmentDate' => $request->input('appointmentDate'),
            'appointmentTime' => $request->input('appointmentTime'),
            'status' => $request->input('status'),
            'subStatus' => $request->input('subStatus'),
            'reMark' => $request->input('reMark')
        ]);
        $planing->save();
            return $this->sendResponse($planing, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.created.failed'));
        }
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

        try {
            $planing = Planing::find($id);
            $planing->update($request->all());
            return $this->sendResponse($planing, trans('actions.updated.success'));
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
            $planing = Planing::find($id);
            $planing->delete();
            return $this->sendResponse($planing, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.destroy.failed'));
        }
    }
}