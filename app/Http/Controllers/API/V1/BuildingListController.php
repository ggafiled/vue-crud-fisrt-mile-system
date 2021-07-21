<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\API\V1\BaseController;
use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Progress;
use Exception;


class BuildingListController extends BaseController
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
            $buildings = Building::with('progress')->get();
            return $this->sendResponse($buildings, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($buildings, trans('actions.get.fialed'));
        }
    }


    public function nonContract()
    {
        try {
            $buildings_non_contract = Progress::whereHas('building', function ($query) {
                $query->where('spendSpace', '=', 'ยังไม่ได้ทำสัญญา');
            })->with('building')->get();
            return $this->sendResponse($buildings_non_contract, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($buildings_non_contract, trans('actions.get.fialed'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
