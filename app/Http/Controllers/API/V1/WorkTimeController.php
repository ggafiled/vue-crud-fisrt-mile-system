<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Worktime;
use Illuminate\Http\Request;
use Exception;

class WorkTimeController extends BaseController
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

        try {
            $workTime = Worktime::all();
            return $this->sendResponse($workTime, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.fialed'));
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
            $workTime = Worktime::create($request->all());
            return $this->sendResponse($workTime, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.fialed'));
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
            $workTime = Worktime::withTrashed()->findOrFail($id);
            $workTime->update($request->all());
            return $this->sendResponse($workTime, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.fialed'));
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
            $workTime = Worktime::withTrashed()->findOrFail($id);
            $workTime->delete();
            return $this->sendResponse($workTime, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.fialed'));
        }
    }
}