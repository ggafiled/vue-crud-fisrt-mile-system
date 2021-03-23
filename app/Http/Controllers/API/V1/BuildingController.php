<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\Building\BuildingRequest;
use Illuminate\Http\Request;
use App\Events\BuildingEvent;
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
        $buildings = Building::paginate(10);
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
    public function store(BuildingRequest $request)
    {
        $building = Building::create([
            'buildingId'=> $request['buildingId'],
            'fmCode'=> $request['fmCode'],
            'contactName'=> $request['contactName'],
            'phone'=> $request['phone'],
            'email'=> $request['email'],
            'floor'=> $request['floor'],
            'roomNumber'=> $request['roomNumber'],
            'numberLayer'=> $request['numberLayer'],
            'detailAdress'=> $request['detailAdress'],
            'province'=> $request['province'],
            'city'=> $request['city'],
            'postalCode'=> $request['postalCode'],
            'latitude'=> $request['latitude'],
            'longtude'=> $request['longtude'],
            'priceSquare'=> $request['priceSquare'],
            'workingTime'=> $request['workingTime'],
            'blance'=> $request['blance'],
            'developer'=> $request['developer'],
            'grade'=> $request['grade'],
            'note'=> $request['note'],
            'area'=> $request['area']
        ]);

        event(new BuildingEvent($building));

        return $this->sendResponse($building, 'Building Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BuildingRequest $request, $id)
    {
        $building = Building::findOrFail($id);

        $building->update($request->all());

        return $this->sendResponse($building, 'Building Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin');

        $building = Building::findOrFail($id);
        // delete the user

        $building->delete();

        return $this->sendResponse([$building], 'Building has been Deleted');
    }
}