<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Accountant;
use App\Models\Building;
use Exception;
use Illuminate\Http\Request;

class AccountantController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('role:superadministrator|administrator|user')->only(['index']);
        $this->middleware('role:superadministrator|administrator')->only(['store', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountant = Accountant::with(
            'building:id,projectName'
        )->get();
        return $this->sendResponse($accountant, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError($ex, trans('actions.get.failed'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {
        try {
            $accountant = new Accountant([
                'building_id' => $request->input('building_id'),
                'statusContrater' => $request->input('statusContrater'),
                'dateConnect' => $request->input('dateConnect'),
                'dateDisconnect' => $request->input('dateDisconnect'),
                'workSheet' => $request->input('workSheet'),
                'reMarkAccount' => $request->input('reMarkAccount')
            ]);
            $accountant->save();
            return $this->sendResponse($accountant, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($ex, trans('actions.created.failed'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $request, $id)
    {
        try {
            $accountant = Accountant::find($id);
            $accountant->update($request->all());
            return $this->sendResponse($accountant, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.updated.failed'));
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
            $accountant = Accountant::find($id);
            $accountant->delete();

            return $this->sendResponse($accountant, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.destroy.failed'));
        }
    }
}
