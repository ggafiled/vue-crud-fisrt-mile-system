<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\AreaTrueNew;
use Illuminate\Http\Request;
use Exception;

class AreaTrueNewController extends BaseController
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
        // $areaTrue = AreaTrue::all();
        // return $this->sendResponse($areaTrue, trans('actions.get.success'));
        // try {
        // } catch (Exception $ex) {
        //     return $this->sendError($areaTrue, trans('actions.created.failed'));
        // }

        try {
            $areaTrueNew = AreaTrueNew::orderBy('updated_at','asc')->get();
            return $this->sendResponse($areaTrueNew, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.created.failed'));
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
            $areaTrueNew = new AreaTrueNew([
                'AreaTrueNew' => $request->input('AreaTrueNew'),
            ]);
            $areaTrueNew->save();
            return $this->sendResponse($areaTrueNew, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($areaTrueNew, trans('actions.created.failed'));
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
            $areaTrueNew = AreaTrueNew::find($id);
            $areaTrueNew->update($request->all());
            return $this->sendResponse($areaTrueNew, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($areaTrueNew, trans('actions.created.failed'));
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
            $areaTrueNew = AreaTrueNew::find($id);
            $areaTrueNew->delete();
            return $this->sendResponse($areaTrueNew, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError($areaTrueNew, trans('actions.created.failed'));
        }
    }
}