<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\Building\BuildingRequest;
use App\Models\Report;
use Exception;
use Illuminate\Http\Request;

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
        $report = Report::with('report')->get();
        return $this->sendResponse($report, trans('actions.get.success'));
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
            $report = Report::create([
                // 'technician_id' => $request->input('technician_id'),
                'building_id' => $request->input('building_id'),
                'statusContrater' => $request->input('statusContrater'),
                'dateConnect' => $request->input('dateConnect'),
                'dateDisconnect' => $request->input('dateDisconnect'),
                'workSheet' => $request->input('workSheet'),
                'idRequired' => $request->input('idRequired'),
                'reMarkAccount' => $request->input('reMarkAccount')
            ]);


            return $this->sendResponse($report, trans('actions.created.success'));
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
            $contractor = Contractor::find($id);
            $contractor->update($request->all());

            return $this->sendResponse($contractor, trans('actions.updated.success'));
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
            return $this->sendResponse($contractor, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.destroy.failed'));
        }
    }
}
