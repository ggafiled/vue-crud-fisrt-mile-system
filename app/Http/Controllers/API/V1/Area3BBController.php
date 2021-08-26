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
}
