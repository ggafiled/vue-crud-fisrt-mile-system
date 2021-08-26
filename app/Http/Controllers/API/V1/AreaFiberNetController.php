<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\AreaFiberNet;
use Illuminate\Http\Request;
use Exception;

class AreaFiberNetController extends BaseController
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
        $areaFiberNet = AreaFiberNet::all();
        return $this->sendResponse($areaFiberNet, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError($areaFiberNet, trans('actions.get.fialed'));
        }
    }
}
