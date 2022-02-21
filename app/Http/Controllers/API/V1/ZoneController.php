<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Zone;
use Illuminate\Http\Request;
use Exception;

class ZoneController extends BaseController
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
            $zone = Zone::all();
            return $this->sendResponse($zone, trans('actions.get.success'));
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
            $zone = Zone::create([
                'zoneName' => $request->input('zoneName'),
                'zoneTel' => $request->input('zoneTel'),
                'zoneEmail' => $request->input('zoneEmail'),
            ]);
            return $this->sendResponse($zone, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.created.fialed'));
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
            $zone = Zone::withTrashed()->findOrFail($id);
            $zone->update($request->all());
            return $this->sendResponse($zone, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.updated.fialed'));
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
            $zone = Zone::withTrashed()->findOrFail($id);
            $zone->delete();
            return $this->sendResponse($zone, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.destroy.fialed'));
        }
    }
}
