<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class AreaController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $area = Area::all();
            return $this->sendResponse($area, trans('actions.get.success'));
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
            $area = Area::create($request->all());
            return $this->sendResponse($area, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.fialed'));
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
            $area = Area::withTrashed()->findOrFail($id);
            $area->update($request->all());
            return $this->sendResponse($area, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.fialed'));
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
            $area = Area::withTrashed()->findOrFail($id);
            $area->delete();
            return $this->sendResponse($area, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.fialed'));
        }
    }
}