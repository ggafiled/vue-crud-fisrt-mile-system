<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\Planing\PlaningRequest;
use App\Models\Planing;
use Exception;
use Illuminate\Http\Request;

class PlaningController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('role:superadministrator|administrator')->only(['create', 'store', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Planing = Planing::with('building')->get();
        // return $this->sendResponse($Planing, trans('actions.get.success'));

        try {
            $planing = Planing::with(
                'building', 'technician',
                'isp:id,isp as name',
                'agentDetail:id,agentDetail as name',
                'jobtype:id,jobType as name',
                'ispId:id,isp as name'
            )->get();
            return $this->sendResponse($planing, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($ex, trans('actions.get.failed'));
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
    public function store(PlaningRequest $request)
    {

        try {
            $planing = new Planing([
                'building_id' => $request->input('building_id'),
                'isp_id' => $request->input('isp_id'),
                'agentDetail_id' => $request->input('agentDetail_id'),
                'jobtype_id' => $request->input('jobtype_id'),
                'technician_id' => $request->input('technician_id'),
                'callver_id' => $request->input('callver_id'),
                'callverStatus_id' => $request->input('callverStatus_id'),
                'ispId_id' => $request->input('ispId_id'),
                'problemsolution_id' => $request->input('problemsolution_id'),
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'tel' => $request->input('tel'),
                'tel2' => $request->input('tel2'),
                'theBuilding' => $request->input('theBuilding'),
                'floor' => $request->input('floor'),
                'room' => $request->input('room'),
                'circuit' => $request->input('circuit'),
                'entranceFee' => $request->input('entranceFee'),
                'appointmentDate' => $request->input('appointmentDate'),
                'appointmentTime' => $request->input('appointmentTime'),
                'status' => $request->input('status'),
                'subStatus' => $request->input('subStatus'),
                'reMark' => $request->input('reMark'),
            ]);
            $planing->save();
            return $this->sendResponse($planing, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($ex, trans('actions.created.failed'));
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
    public function update(PlaningRequest $request, $id)
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

    /**
     * get lantitude and longitude from planning item depending on building information.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadCoordinatePlanningOfBuilding()
    {
        try {
            $collection = [];
            $planing = Planing::with(
                ['building:id,workTime_id,longitude,latitude,projectName as name',
                    'building.workTime:id,workTime as name'])
                ->whereHas('building', function ($query) {
                    return $query->where('longitude', '!=', 0)->where('latitude', '!=', 0);
                })
                ->get()
                ->map(function ($item) use ($collection) {
                    $collection["location"] = ["lon" => $item->building->longitude, "lat" => $item->building->latitude];
                    $collection["title"] = $item->building->name;
                    $collection["detail"] = $item->building->workTime->name ?? "unknown";
                    return $collection;
                });
            return $this->sendResponse($planing, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.failed'));
        }
    }
}