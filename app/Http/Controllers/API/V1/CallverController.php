<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Callver;
use Illuminate\Http\Request;
use Exception;

class CallverController extends BaseController
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
        $callver = Callver::all();
        return $this->sendResponse($callver, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError($callver, trans('actions.created.failed'));
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
            $callver = new Callver([
                'callVer' => $request->input('callVer'),
            ]);
            $callver->save();
            return $this->sendResponse($callver, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($callver, trans('actions.created.failed'));
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
            $callver = Callver::find($id);
            $callver->update($request->all());
            return $this->sendResponse($callver, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($callver, trans('actions.created.failed'));
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
            $callver = Callver::find($id);
            $callver->delete();
            return $this->sendResponse($callver, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError($callver, trans('actions.created.failed'));
        }
    }
}

