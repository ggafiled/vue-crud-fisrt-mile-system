<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\Constarution\ConstarutionRequest;
use App\Models\Constarution;
use Exception;
use Illuminate\Http\Request;

class ConstarutionController extends BaseController
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
            $constarution = Constarution::with(
                'building',
                'desingBy:id,nameSerway as name',
                'surveyDesing:id,status as name',
                'ifcc:id,status as name',
                'wallBox:id,status as name',
                'microductD:id,status as name',
                'microductK:id,status as name',
                'fiberConvertion:id,status as name')->get();
            return $this->sendResponse($constarution, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.created.failed'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ConstarutionRequest $request)
    {
        try {
            $constarution = new Constarution([
                'building_id' => $request->input('building_id'),
                'desingBy_id' => $request->input('desingBy_id'),
                'surveyDesing_id' => $request->input('surveyDesing_id'),
                'ifcc_id' => $request->input('ifcc_id'),
                'wallBox_id' => $request->input('wallBox_id'),
                'microductD_id' => strtolower($request->input('type')) == strtolower('Microduct') ? $request->input('microductD_id') : null,
                'microductK_id' => strtolower($request->input('type')) == strtolower('Microduct') ? $request->input('microductK_id') : null,
                'fiberConvertion_id' => strtolower($request->input('type')) == strtolower('FiberConvertion') ? $request->input('fiberConvertion_id') : null,
                'projectNameTot' => $request->input('projectNameTot'),
                'projectNameTrue' => $request->input('projectNameTrue'),
                'projectNameAis' => $request->input('projectNameAis'),
                'projectName3bb' => $request->input('projectName3bb'),
                'projectNameFiberNet' => $request->input('projectNameFiberNet'),
                'surveyDesingDate' => $request->input('surveyDesingDate'),
                'ifccDate' => $request->input('ifccDate'),
                'wallBoxDate' => $request->input('wallBoxDate'),
                'type' => $request->input('type'),
                'microductDateD' => strtolower($request->input('type')) == strtolower('Microduct') ? $request->input('microductDateD') : null,
                'microductDateK' => strtolower($request->input('type')) == strtolower('Microduct') ? $request->input('microductDateK') : null,
                'fiberConvertionDateD' => strtolower($request->input('type')) == strtolower('FiberConvertion') ? $request->input('fiberConvertionDate') : null,
                'blow' => $request->input('blow'),
                'splice' => $request->input('splice'),
            ]);
            $constarution->save();
            return $this->sendResponse($constarution, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.created.failed'));
        }
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
    public function update(ConstarutionRequest $request, $id)
    {
        try {
            $constarution = Constarution::find($id);
            $constarution->update([
                'building_id' => $request->input('building_id'),
                'desingBy_id' => $request->input('desingBy_id'),
                'surveyDesing_id' => $request->input('surveyDesing_id'),
                'ifcc_id' => $request->input('ifcc_id'),
                'wallBox_id' => $request->input('wallBox_id'),
                'microductD_id' => strtolower($request->input('type')) == strtolower('Microduct') ? $request->input('microductD_id') : null,
                'microductK_id' => strtolower($request->input('type')) == strtolower('Microduct') ? $request->input('microductK_id') : null,
                'fiberConvertion_id' => strtolower($request->input('type')) == strtolower('FiberConvertion') ? $request->input('fiberConvertion_id') : null,
                'projectNameTot' => $request->input('projectNameTot'),
                'projectNameTrue' => $request->input('projectNameTrue'),
                'projectNameAis' => $request->input('projectNameAis'),
                'projectName3bb' => $request->input('projectName3bb'),
                'projectNameFiberNet' => $request->input('projectNameFiberNet'),
                'surveyDesingDate' => $request->input('surveyDesingDate'),
                'ifccDate' => $request->input('ifccDate'),
                'wallBoxDate' => $request->input('wallBoxDate'),
                'type' => $request->input('type'),
                'microductDateD' => strtolower($request->input('type')) == strtolower('Microduct') ? $request->input('microductDateD') : null,
                'microductDateK' => strtolower($request->input('type')) == strtolower('Microduct') ? $request->input('microductDateK') : null,
                'fiberConvertionDateD' => strtolower($request->input('type')) == strtolower('FiberConvertion') ? $request->input('fiberConvertionDate') : null,
                'blow' => $request->input('blow'),
                'splice' => $request->input('splice'),
            ]);
            return $this->sendResponse($constarution, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.created.failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $constarution = Constarution::find($id);
            $constarution->delete();
            return $this->sendResponse($constarution, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.created.failed'));
        }
    }
}