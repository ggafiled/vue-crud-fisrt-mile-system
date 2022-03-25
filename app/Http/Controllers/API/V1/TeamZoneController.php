<?php

namespace App\Http\Controllers\API\V1;

use App\Models\TeamZone;
use App\Models\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\API\V1\BaseController;
use Exception;

class TeamZoneController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamzones = TeamZone::all();
        return $this->sendResponse($teamzones, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.failed'));
        }
        // try {
        //     $teamzone = TeamZone::where("zone_id","=",request("zone_id"))->get();
        //     return $this->sendResponse($teamzone, trans('actions.get.success'));
        // } catch (Exception $ex) {
        //     return $this->sendError([], trans('actions.get.fialed'));
        // }
    }

    public function queryZone()
    {
        try {
            $teamzone = Zone::all();
            return $this->sendResponse($teamzone, trans('actions.get.success'));
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
            $teamZone = TeamZone::create([
                'zone_id' => $request->input('zone_id'),
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'date' => $request->input('date'),
                'tel' => $request->input('tel'),
                'tel2' => $request->input('tel2'),
                'email' => $request->input('email'),
                'status' => $request->input('status'),
                'remark' => $request->input('remark'),
            ]);
            return $this->sendResponse($teamZone, trans('actions.created.success'));
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
            $teamZone = TeamZone::withTrashed()->findOrFail($id);
            $teamZone->update($request->all());
            return $this->sendResponse($teamZone, trans('actions.updated.success'));
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
            $teamZone = TeamZone::withTrashed()->findOrFail($id);
            $teamZone->delete();
            return $this->sendResponse($teamZone, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.destroy.fialed'));
        }
    }

}
