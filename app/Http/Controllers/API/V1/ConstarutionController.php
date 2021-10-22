<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\Constarution\ConstarutionRequest;
use App\Models\Constarution;
use App\Models\Building;
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
                'building:id,subBuildingsum'
            )->get();
            return $this->sendResponse($constarution, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.failed'));
        }
    }

    public function queryBuilding()
    {
        try {
            $constarution = Building::where('statusBuilding', '=', 'Complete' )->get();
            return $this->sendResponse($constarution, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.failed'));
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
                'projectNameTot' => $request->input('projectNameTot'),
                'projectNameTrue' => $request->input('projectNameTrue'),
                'projectNameAis' => $request->input('projectNameAis'),
                'projectName3bb' => $request->input('projectName3bb'),
                'projectNameFiberNet' => $request->input('projectNameFiberNet'),
                'projectNameTxrt' => $request->input('projectNameTxrt'),
                // 'buildingSum' => $request->input('buildingSum'),
                // 'buildingNumber' => $request->input('buildingNumber'),
                // 'buildingFloor' => $request->input('buildingFloor'),
                // 'unitFloor' => $request->input('unitFloor'),
                'fmProgress' => $request->input('fmProgress'),
                'teamserway' => $request->input('teamserway'),
                'surweyDate' => $request->input('surweyDate'),
                'ifcccType' => $request->input('ifcccType'),
                'ifcccStatus' => $request->input('ifcccStatus'),
                'wallboxType' => $request->input('wallboxType'),
                'wallboxStatus' => $request->input('wallboxStatus'),
                'microductType' => $request->input('microductType'),
                'microductStatus' => $request->input('microductStatus'),
                'microductType1' => strtolower($request->input('microductType')) == strtolower('FiberBlow') ? $request->input('microductType1') : null,
                'microductType2' => strtolower($request->input('microductType')) == strtolower('FiberBlow') ? $request->input('microductType2') : null,
                'microductSize' => strtolower($request->input('microductType')) == strtolower('FiberBlow') ? $request->input('microductSize') : null,
                'microductFloor' => strtolower($request->input('microductType')) == strtolower('FiberBlow') ? $request->input('microductFloor') : null,
                'blowStatus' => strtolower($request->input('microductType')) == strtolower('FiberBlow') ? $request->input('blowStatus') : null,
                'blowCore' => strtolower($request->input('microductType')) == strtolower('FiberBlow') ? $request->input('blowCore') : null,
                'convertionalType' => strtolower($request->input('microductType')) == strtolower('FiberConvertional') ? $request->input('convertionalType') : null,
                'convertionalFloor' => strtolower($request->input('microductType')) == strtolower('FiberConvertional') ? $request->input('convertionalFloor') : null,
                'vertically' => strtolower($request->input('microductType')) == strtolower('FiberConvertional') ? $request->input('vertically') : null,
                'verticallyType' => strtolower($request->input('microductType')) == strtolower('FiberConvertional') ? $request->input('verticallyType') : null,
                'buildingStatus' => strtolower($request->input('microductType')) == strtolower('FiberConvertional') ? $request->input('buildingStatus') : null,
                'buildingDate' => strtolower($request->input('microductType')) == strtolower('FiberConvertional') ? $request->input('buildingDate') : null,
                'spliceStatus' => $request->input('spliceStatus'),
                'spliceCore' => $request->input('spliceCore'),
            ]);
            $constarution->save();

            activity()
                ->performedOn($constarution)
                ->withProperties($constarution->toArray())
                ->event('created')
                ->useLog('constarution')
                ->log('This model has been created');

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
                'projectNameTot' => $request->input('projectNameTot'),
                'projectNameTrue' => $request->input('projectNameTrue'),
                'projectNameAis' => $request->input('projectNameAis'),
                'projectName3bb' => $request->input('projectName3bb'),
                'projectNameFiberNet' => $request->input('projectNameFiberNet'),
                'projectNameTxrt' => $request->input('projectNameTxrt'),
                // 'buildingSum' => $request->input('buildingSum'),
                // 'buildingNumber' => $request->input('buildingNumber'),
                // 'buildingFloor' => $request->input('buildingFloor'),
                // 'unitFloor' => $request->input('unitFloor'),
                'fmProgress' => $request->input('fmProgress'),
                'teamserway' => $request->input('teamserway'),
                'surweyDate' => $request->input('surweyDate'),
                'ifcccType' => $request->input('ifcccType'),
                'ifcccStatus' => $request->input('ifcccStatus'),
                'wallboxType' => $request->input('wallboxType'),
                'wallboxStatus' => $request->input('wallboxStatus'),
                'microductType' => $request->input('microductType'),
                'microductStatus' => $request->input('microductStatus'),
                'microductType1' => strtolower($request->input('microductType')) == strtolower('FiberBlow') ? $request->input('microductType1') : null,
                'microductType2' => strtolower($request->input('microductType')) == strtolower('FiberBlow') ? $request->input('microductType2') : null,
                'microductSize' => strtolower($request->input('microductType')) == strtolower('FiberBlow') ? $request->input('microductSize') : null,
                'microductFloor' => strtolower($request->input('microductType')) == strtolower('FiberBlow') ? $request->input('microductFloor') : null,
                'blowStatus' => strtolower($request->input('microductType')) == strtolower('FiberBlow') ? $request->input('blowStatus') : null,
                'blowCore' => strtolower($request->input('microductType')) == strtolower('FiberBlow') ? $request->input('blowCore') : null,
                'convertionalType' => strtolower($request->input('microductType')) == strtolower('FiberConvertional') ? $request->input('convertionalType') : null,
                'convertionalFloor' => strtolower($request->input('microductType')) == strtolower('FiberConvertional') ? $request->input('convertionalFloor') : null,
                'vertically' => strtolower($request->input('microductType')) == strtolower('FiberConvertional') ? $request->input('vertically') : null,
                'verticallyType' => strtolower($request->input('microductType')) == strtolower('FiberConvertional') ? $request->input('verticallyType') : null,
                'buildingStatus' => strtolower($request->input('microductType')) == strtolower('FiberConvertional') ? $request->input('buildingStatus') : null,
                'buildingDate' => strtolower($request->input('microductType')) == strtolower('FiberConvertional') ? $request->input('buildingDate') : null,
                'spliceStatus' => $request->input('spliceStatus'),
                'spliceCore' => $request->input('spliceCore'),
            ]);

            activity()
                ->performedOn($constarution)
                ->withProperties($constarution->toArray())
                ->event('update')
                ->useLog('constarution')
                ->log('This model has been updated');

            return $this->sendResponse($constarution, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.updated.failed'));
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

            activity()
                ->performedOn($constarution)
                ->withProperties($constarution->toArray())
                ->event('daleted')
                ->useLog('constarution')
                ->log('This model has been deleted');

            return $this->sendResponse($constarution, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.destroy.failed'));
        }
    }
}