<?php

namespace App\Http\Controllers\API\V1;

use App\Models\TeamZone;
use Illuminate\Http\Request;
use App\Http\Controllers\API\V1\BaseController;
use Exception;

class TeamZoneController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $teamzone = TeamZone::where("zone_id","=",request("zone_id"))->get();
            return $this->sendResponse($teamzone, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.fialed'));
        }
    }
}
