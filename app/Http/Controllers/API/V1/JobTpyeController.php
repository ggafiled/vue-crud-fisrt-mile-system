<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\JobTpye;
use Illuminate\Http\Request;
use Exception;

class JobTpyeController extends BaseController
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
        $jobtpye = JobTpye::all();
        return $this->sendResponse($jobtpye, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError($jobtpye, trans('actions.get.fialed'));
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
            $jobtpye = new JobTpye([
                'jobType' => $request->input('jobType'),
            ]);
            $jobtpye->save();
            return $this->sendResponse($jobtpye, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($jobtpye, trans('actions.created.fialed'));
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
            $jobtpye = JobTpye::find($id);
            $jobtpye->update($request->all());
            return $this->sendResponse($jobtpye, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($jobtpye, trans('actions.updated.fialed'));
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
            $jobtpye = JobTpye::find($id);
            $jobtpye->delete();
            return $this->sendResponse($jobtpye, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError($jobtpye, trans('actions.destroy.fialed'));
        }
    }
}
