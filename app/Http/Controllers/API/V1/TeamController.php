<?php

namespace App\Http\Controllers\api\v1;

use Exception;
use App\Http\Controllers\API\V1\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('role:superadministrator|administrator|user')->only(['create', 'store', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (!\Gate::allows('isAdmin')) {
                return $this->unauthorizedResponse();
            }
            $teams = Team::with(['users' => function ($query) {
                $query->select('id', 'name as text');
            }])->get();
            return $this->sendError($teams, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($teams, trans('actions.get.fialed'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        try {
            if (!\Gate::allows('isAdmin')) {
                return $this->unauthorizedResponse();
            }
            $teams = Team::all();
            return $this->sendResponse($teams, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($teams, trans('actions.get.fialed'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
