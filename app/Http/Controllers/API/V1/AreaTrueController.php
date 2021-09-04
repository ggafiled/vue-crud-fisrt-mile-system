<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\AreaTrue;
use Illuminate\Http\Request;
use Exception;

class AreaTrueController extends BaseController
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
            $areaTrue = AreaTrue::orderBy('updated_at','asc')->get();
            return $this->sendResponse($areaTrue, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($areaTrue, trans('actions.created.failed'));
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
            $areaTrue = new AreaTrue([
                'AreaTrue' => $request->input('AreaTrue'),
            ]);
            $areaTrue->save();
            return $this->sendResponse($areaTrue, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($areaTrue, trans('actions.created.failed'));
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
            $areaTrue = AreaTrue::find($id);
            $areaTrue->update($request->all());
            return $this->sendResponse($areaTrue, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($areaTrue, trans('actions.created.failed'));
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
            $areaTrue = AreaTrue::find($id);
            $areaTrue->delete();
            return $this->sendResponse($areaTrue, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError($areaTrue, trans('actions.created.failed'));
        }
    }
}
