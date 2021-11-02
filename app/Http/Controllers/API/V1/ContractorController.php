<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Contractor;
use Exception;
use Illuminate\Http\Request;

class ContractorController extends BaseController
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
        $contractor = Contractor::with('contractor',)->get();
        return $this->sendResponse($contractor, trans('actions.get.success'));
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
    public function store($request)
    {
        try {
            $contractor = Contractor::create([
                // 'technician_id' => $request->input('technician_id'),
                'building_id' => $request->input('building_id'),
                'callver_id' => $request->input('callver_id'),
                'appointmentTimeCustomer' => $request->input('appointmentTimeCustomer'),
                'callverStatus_id' => $request->input('callverStatus_id'),
                'technicians_id' => $request->input('technicians_id'),
                'idRequired' => $request->input('idRequired'),
                'problemsolution_id' => $request->input('problemsolution_id'),
                'confirmAppointment' => $request->input('confirmAppointment'),
                'reMarkzone' => $request->input('reMarkzone'),
                'equipmentInstall1' => $request->input('equipmentInstall1'),
                'snInstall1' => $request->input('snInstall1'),
                'equipmentInstall2' => $request->input('equipmentInstall2'),
                'snInstall2' => $request->input('snInstall2'),
                'equipmentInstall3' => $request->input('equipmentInstall3'),
                'snInstall3' => $request->input('snInstall3'),
                'equipmentInstall4' => $request->input('equipmentInstall4'),
                'snInstall4' => $request->input('snInstall4'),
                'equipmentInstall5' => $request->input('equipmentInstall5'),
                'snInstall5' => $request->input('snInstall5'),
                'equipmentInstall6' => $request->input('equipmentInstall6'),
                'snInstall6' => $request->input('snInstall6'),
                'equipmentInstall7' => $request->input('equipmentInstall7'),
                'snInstall7' => $request->input('snInstall7')
            ]);


            return $this->sendResponse($contractor, trans('actions.created.success'));
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
    public function update( $request, $id)
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
        try {
            $contractor = Contractor::find($id);
            $contractor->delete();
            
            return $this->sendResponse($contractor, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.updated.failed'));
        }
    }
}
