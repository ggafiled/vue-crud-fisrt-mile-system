<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Teamserway;
use Exception;
use Illuminate\Http\Request;

class TeamSerwayController extends BaseController
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
            $teamserways = Teamserway::orderBy('updated_at','asc')->get();
            return $this->sendResponse($teamserways, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($teamserways, trans('actions.created.failed'));
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
            $teamserways = Teamserway::create([
                'nameSerway' => $request->input('nameSerway'),
            ]);
            $teamserways->save();
            return $this->sendResponse($teamserways, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($teamserways, trans('actions.created.failed'));
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
            $teamserways = Teamserway::find($id);
            $teamserways->update($request->all());
            return $this->sendResponse($teamserways, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($teamserways, trans('actions.created.failed'));
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
            $teamserways = Teamserway::find($id);
            $teamserways->delete();
            return $this->sendResponse($teamserways, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError($teamserways, trans('actions.created.failed'));
        }
    }
}
