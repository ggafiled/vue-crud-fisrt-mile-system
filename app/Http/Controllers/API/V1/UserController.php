<?php

namespace App\Http\Controllers\API\V1;

use Auth;
use Exception;
use App\Http\Requests\Users\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('role:superadministrator|administrator')->only('store');
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
            // $this->authorize('isAdmin');

            $users = User::with('roles:id')->get();

            return $this->sendResponse($users, 'Users list');
            return $this->sendResponse($users, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($users, trans('actions.get.fialed'));
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
            $users = User::get(['name', 'id']);
            return $this->sendResponse($users, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError($users, trans('actions.get.fialed'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Users\UserRequest  $request
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            $access = Role::find($request['role']);
            $user->attachRole($access);
            return $this->sendResponse($user, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError($user, trans('actions.created.fialed'));
        }
    }

    /**
     * Update the resource in storage
     *
     * @param  \App\Http\Requests\Users\UserRequest  $request
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(UserRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            if (!empty($request->password)) {
                $request->merge(['password' => Hash::make($request['password'])]);
            }

            $user->update($request->all());
            $access = Role::find($request['role']);
            $user->syncRoles([$access]);
            return $this->sendResponse($user, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError($user, trans('actions.updated.fialed'));
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
            $this->authorize('isAdmin');

            $user = User::findOrFail($id);
            // delete the user

            $user->delete();
            return $this->sendResponse($user, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError($user, trans('actions.destroy.fialed'));
        }
    }
}