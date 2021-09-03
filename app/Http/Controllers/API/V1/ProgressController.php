<?php

namespace App\Http\Controllers\api\v1;

use Exception;
use App\Http\Controllers\API\V1\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Progress;

class ProgressController extends BaseController
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
            $progress = Progress::with('building')->get();
            return $this->sendResponse($progress, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($progress, trans('actions.created.failed'));
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
        try {
            $progress = new Progress([
                'building_id' => $request->input('building_id'),
                'fmProgress_id' => $request->input('fmProgress_id'),
                'totProgress_id' => $request->input('totProgress_id'),
                'progress3bb_id' => $request->input('progress3bb_id'),
                'sinetProgress_id' => $request->input('sinetProgress_id'),
                'fnProgress_id' => $request->input('fnProgress_id'),
                'trueProgress_id' => $request->input('trueProgress_id'),
                'dateFm' => $request->input('dateFm'),
                'dateTot' => $request->input('dateTot'),
                'dateAis' => $request->input('dateAis'),
                'date3BB' => $request->input('date3BB'),
                'dateSinet' => $request->input('dateSinet'),
                'dateFn' => $request->input('dateFn'),
                'dateTrue' => $request->input('dateTrue')
            ]);
            $progress->save();
            return $this->sendResponse($progress, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($progress, trans('actions.created.failed'));
        }
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

        try {
            $progress = Progress::find($id);
            $progress->update($request->all());
            return $this->sendResponse($progress, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($progress, trans('actions.created.failed'));
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
            $progress = Progress::find($id);
            $progress->delete();

            return $this->sendResponse($progress, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError($progress, trans('actions.created.failed'));
        }
    }
}
