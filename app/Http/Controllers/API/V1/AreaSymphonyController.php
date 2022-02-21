<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\AreaSymphony;
use Illuminate\Http\Request;
use Exception;

class AreaSymphonyController extends BaseController
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
            $areaSymphony = AreaSymphony::orderBy('updated_at','asc')->get();
            return $this->sendResponse($areaSymphony, trans('actions.get.success'));
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
            $areaSymphony = new AreaSymphony([
                'areaSymphony' => $request->input('areaSymphony'),
            ]);
            $areaSymphony->save();
            return $this->sendResponse($areaSymphony, trans('actions.created.success'));
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
            $areaSymphony = AreaSymphony::find($id);
            $areaSymphony->update($request->all());
            return $this->sendResponse($areaSymphony, trans('actions.updated.success'));
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
            $areaSymphony = AreaSymphony::find($id);
            $areaSymphony->delete();
            return $this->sendResponse($areaSymphony, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.destroy.failed'));
        }
    }
}
