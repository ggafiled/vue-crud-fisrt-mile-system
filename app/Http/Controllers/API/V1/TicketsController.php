<?php

namespace App\Http\Controllers\API\V1;

use Auth;
use Exception;
use App\Models\Ticket;
use App\Http\Controllers\API\V1\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TicketsController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api');
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
                $tickets = Ticket::where('user_id', Auth::user()->id)->with(['category','comments','user','assigned_to'])->get();
                return $this->sendResponse($tickets, trans('actions.get.success'));
            }
            // $this->authorize('isAdmin');

            $tickets = Ticket::with(['category','comments','user','assigned_to'])->get();

            return $this->sendResponse($tickets, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($tickets, trans('actions.get.fialed') . $ex->getMessage());
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
        try {
            if (!\Gate::allows('isAdmin')) {
                $tickets = Ticket::where('ticket_id','=', $id)
                ->with(['category','comments','user','assigned_to'])
                ->firstOrFail();
                if($tickets->user_id != Auth::user()->id){
                    return $this->unauthorizedResponse();
                }
                return $this->sendResponse($tickets, trans('actions.get.success'));
            }
            // $this->authorize('isAdmin');

            $tickets = Ticket::where('ticket_id', $id)
            ->with(['category','comments','user','assigned_to'])
            ->get();

            return $this->sendResponse($tickets, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($tickets, trans('actions.get.fialed') . $ex->getMessage());
        }
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