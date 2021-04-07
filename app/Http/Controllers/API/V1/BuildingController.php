<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Building;

class Buildingcontroller extends BaseController{


    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('role:superadministrator|administrator|user')->only(['index','create']);
        $this->middleware('role:superadministrator|administrator')->only(['store','update','destroy']);
    }

    /**
    * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::with('member')->get();
        return $this->sendResponse($buildings,'Buildings List');
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
        $buidings = new Building([
            'buildingId' => $request->input('buildingId'),
            'fmCode' => $request->input('fmCode'),
            'contactName' => $request->input('contactName'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'area' => $request->input('area'),
            'floor' => $request->input('floor'),
            'roomNumber' => $request->input('roomNumber'),
            'numberLayer' => $request->input('numberLayer'),
            'detailAdress' => $request->input('detailAdress'),
            'province' => $request->input('province'),
            'city' => $request->input('city'),
            'postalCode' => $request->input('postalCode'),
            'latitude' => $request->input('latitude'),
            'longtude' => $request->input('longtude'),
            'priceSquare' => $request->input('priceSquare'),
            'workingTime' => $request->input('workingTime'),
            'blance' => $request->input('blance'),
            'developer' => $request->input('developer'),
            'grade' => $request->input('grade'),
            'note' => $request->input('note')
        ]);
        $buidings->save();

        return response()->json('buidings created!');
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
        $buildings = Building::find($id);
        $buildings->update($request->all());

        return response()->json('buildings updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $building = Building::find($id);
        $building->delete();

        return response()->json('building deleted!');
    }
}