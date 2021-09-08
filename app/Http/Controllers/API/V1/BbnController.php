<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Bbn;
use Illuminate\Http\Request;
use App\Http\Controllers\API\V1\BaseController;

class BbnController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $bbn = Bbn::where("area_id","=",request("area_id"))->get();
            return $this->sendResponse($bbn, trans('actions.get.success'));
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
            $bbn = Bbn::create($request->all());
            return $this->sendResponse($bbn, trans('actions.created.success'));
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
            $bbn = Bbn::withTrashed()->findOrFail($id);
            $bbn->update($request->all());
            return $this->sendResponse($bbn, trans('actions.updated.success'));
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
            $bbn = Bbn::withTrashed()->findOrFail($id);
            $bbn->delete();
            return $this->sendResponse($bbn, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.destroy.fialed'));
        }
    }
}