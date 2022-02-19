<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\ContractTerm;
use Illuminate\Http\Request;
use Exception;

class ContractTermController extends  BaseController
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
            $contractTerm = ContractTerm::orderBy('updated_at','asc')->get();
            return $this->sendResponse($contractTerm, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.failed'));
        }
    }
}
