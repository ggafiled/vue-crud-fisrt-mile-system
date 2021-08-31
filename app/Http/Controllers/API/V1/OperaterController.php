<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Operater;
use Illuminate\Http\Request;
use Exception;

class OperaterController extends BaseController
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
        $operater = Operater::all();
        return $this->sendResponse($operater, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError($operater, trans('actions.get.fialed'));
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
            $operater = new Operater([
                'nameSale' => $request->input('nameSale'),
            ]);
            $operater->save();
            return $this->sendResponse($operater, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($operater, trans('actions.created.fialed'));
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
            $operater = Operater::find($id);
            $operater->update($request->all());
            return $this->sendResponse($operater, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($operater, trans('actions.updated.fialed'));
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
            $operater = Operater::find($id);
            $operater->delete();
            return $this->sendResponse($operater, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError($operater, trans('actions.destroy.fialed'));
        }
    }
}
