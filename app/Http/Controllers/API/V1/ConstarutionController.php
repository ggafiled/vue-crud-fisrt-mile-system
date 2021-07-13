<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Constarution;

class ConstarutionController extends BaseController{

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
        $constarution = Constarution::with('building')->get();
        return $this->sendResponse($constarution,'Constarution List');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $constarution = new Constarution([
            'building_id' => $request->input('building_id'),
            'desingBy' => $request->input('desingBy'),
            'surveyDesing' => $request->input('surveyDesing'),
            'surveyDesingDate' => $request->input('surveyDesingDate'),
            'ifcc' => $request->input('ifcc'),
            'ifccDate' => $request->input('ifccDate'),
            'wallBox' => $request->input('wallBox'),
            'wallBoxDate' => $request->input('wallBoxDate'),
            'type' => $request->input('type'),
            'microductD' => $request->input('microductD'),
            'microductDateD' => $request->input('microductDateD'),
            'microductK' => $request->input('microductK'),
            'microductDateK' => $request->input('microductDateK'),
            'fiberConvertion' => $request->input('fiberConvertion'),
            'fiberConvertionDateD' => $request->input('fiberConvertionDateD'),
            'blow' => $request->input('blow'),
            'splice' => $request->input('splice'),
        ]);
        $constarution->save();

        return response()->json('constarution created!');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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
        $constarution = Constarution::find($id);
        $constarution->update($request->all());

        return response()->json('constarution updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $constarution = Constarution::find($id);
        $constarution->delete();

        return response()->json('constarution deleted!');
    }
}
