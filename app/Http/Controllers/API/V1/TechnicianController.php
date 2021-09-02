<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Technician;
use Illuminate\Http\Request;
use Exception;

class TechnicianController extends BaseController
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
        $technician = Technician::all();
        return $this->sendResponse($technician, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError($technician, trans('actions.created.failed'));
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
            $technician = new Technician([
                'teamTechnician' => $request->input('teamTechnician'),
                'phoneTechnician' => $request->input('phoneTechnician'),
                'emailTechnician' => $request->input('emailTechnician'),
            ]);
            $technician->save();
            return $this->sendResponse($technician, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($technician, trans('actions.created.failed'));
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
            $technician = Technician::find($id);
            $technician->update($request->all());
            return $this->sendResponse($technician, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($technician, trans('actions.created.failed'));
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
            $technician = Technician::find($id);
            $technician->delete();
            return $this->sendResponse($technician, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError($technician, trans('actions.created.failed'));
        }
    }
}

