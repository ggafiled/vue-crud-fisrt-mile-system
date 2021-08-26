<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\AreaAis;
use Illuminate\Http\Request;
use Exception;

class AreaAisController extends BaseController
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
        $areaAis = AreaAis::all();
        return $this->sendResponse($areaAis, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError($areaAis, trans('actions.get.fialed'));
        }
    }
}
