<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Callverstatus;
use Illuminate\Http\Request;
use Exception;

class CallverstatusController extends BaseController
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
        $callverstatus = Callverstatus::all();
        return $this->sendResponse($callverstatus, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError($callverstatus, trans('actions.created.failed'));
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
            $callverstatus = new Callverstatus([
                'callVer' => $request->input('callVer'),
            ]);
            $callverstatus->save();
            return $this->sendResponse($callverstatus, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($callverstatus, trans('actions.created.failed'));
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
            $callverstatus = Callverstatus::find($id);
            $callverstatus->update($request->all());
            return $this->sendResponse($callverstatus, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($callverstatus, trans('actions.created.failed'));
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
            $callverstatus = Callverstatus::find($id);
            $callverstatus->delete();
            return $this->sendResponse($callverstatus, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError($callverstatus, trans('actions.created.failed'));
        }
    }
}


