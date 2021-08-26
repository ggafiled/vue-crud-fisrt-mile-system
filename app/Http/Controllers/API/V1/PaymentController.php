<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Payment;
use Illuminate\Http\Request;
use Exception;

class PaymentController extends BaseController
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
        $payment = Payment::all();
        return $this->sendResponse($payment, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError($payment, trans('actions.get.fialed'));
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
            $payment = new Payment([
                'paymentType' => $request->input('paymentType'),
            ]);
            $payment->save();
            return $this->sendResponse($payment, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($payment, trans('actions.created.fialed'));
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
            $payment = Payment::find($id);
            $payment->update($request->all());
            return $this->sendResponse($payment, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($payment, trans('actions.updated.fialed'));
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
            $payment = Payment::find($id);
            $payment->delete();
            return $this->sendResponse($payment, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError($payment, trans('actions.destroy.fialed'));
        }
    }
}
