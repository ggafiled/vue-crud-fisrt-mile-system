<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Area3bb;
use Illuminate\Http\Request;
use Exception;

class Area3BBController extends BaseController
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
        $area3BB = Area3bb::all();
        return $this->sendResponse($area3BB, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError($area3BB, trans('actions.get.fialed'));
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
            $area3BB = new Area3bb([
                'paymentType' => $request->input('paymentType'),
            ]);
            $area3BB->save();
            return $this->sendResponse($area3BB, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($area3BB, trans('actions.created.fialed'));
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
            $area3BB = Area3bb::find($id);
            $area3BB->update($request->all());
            return $this->sendResponse($area3BB, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($area3BB, trans('actions.updated.fialed'));
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
            $area3BB = Area3bb::find($id);
            $area3BB->delete();
            return $this->sendResponse($area3BB, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError($area3BB, trans('actions.destroy.fialed'));
        }
    }
}
