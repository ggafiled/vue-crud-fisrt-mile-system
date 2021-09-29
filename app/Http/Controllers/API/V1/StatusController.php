<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;


class StatusController extends BaseController
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
            $teamserways = Status::orderBy('updated_at','asc')->get();
            return $this->sendResponse($teamserways, trans('actions.get.success'));
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
    public function store(Request $request)
    {
        try {
            $statuses = Status::create([
                'name' => $request->input('name'),
            ]);
            $statuses->save();
            return $this->sendResponse($statuses, trans('actions.created.success'));
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
    public function update(Request $request, $id)
    {
        try {
            $statuses = Status::find($id);
            $statuses->update($request->all());
            return $this->sendResponse($statuses, trans('actions.updated.success'));
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
            $statuses = Status::find($id);
            $statuses->delete();
            return $this->sendResponse($statuses, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.destroy.failed'));
        }
    }
}