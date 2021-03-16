<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends BaseController
{
    protected $permission = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Permission $permission)
    {
        $this->middleware('auth:api');
        $this->permission = $permission;
        $this->middleware('role:superadministrator|administrator')->only(['store','update','destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!\Gate::allows('isAdmin')) {
            return $this->unauthorizedResponse();
        }
        $permissions = $this->permission->latest()->paginate(10);
        return $this->sendResponse($permissions, 'Permission list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        if (!\Gate::allows('isAdmin')) {
            return $this->unauthorizedResponse();
        }
        $permissions = $this->permission->get(['name', 'id']);
        return $this->sendResponse($permissions, 'Permission list');
    }


    /**
     * Store a newly created resource in storage.
     *
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $permissions = $this->permission->create([
            'name' => strtolower($request->get('name')),
            'display_name' => $request->get('display_name'),
            'description' => $request->get('description')
        ]);

        return $this->sendResponse($permissions, 'Permission Created Successfully');
    }

    /**
     * Update the resource in storage
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $permissions = $this->permission->findOrFail($id);

        $permissions->update($request->all());

        return $this->sendResponse($permissions, 'Permission Information has been updated');
    }

     public function destroy($id)
    {

        $this->authorize('isAdmin');

        $permissions = $this->permission->findOrFail($id);

        $permissions->delete();

        return $this->sendResponse($permissions, 'Permission has been Deleted');
    }
}