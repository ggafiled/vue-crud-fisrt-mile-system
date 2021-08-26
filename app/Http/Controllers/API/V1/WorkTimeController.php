<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Models\Worktime;
use Illuminate\Http\Request;
use Exception;

class WorkTimeController extends BaseController
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
        $workTime = Worktime::all();
        return $this->sendResponse($workTime, trans('actions.get.success'));
        try {
        } catch (Exception $ex) {
            return $this->sendError($workTime, trans('actions.get.fialed'));
        }
    }
}
