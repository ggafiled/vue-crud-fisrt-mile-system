<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    protected $role = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Role $role)
    {
        $this->middleware('auth:api');
        $this->role = $role;
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
        $roles = $this->role->latest()->with(['permissions' => function($query) {
            $query->select('id', 'name as text');
        }])->get();
        return $this->sendResponse($roles, 'Roles list');
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
        $roles = $this->role->paginate(20);
        return $this->sendResponse($roles, 'Roles list');
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
        $roles = $this->role->create([
            'name' => strtolower($request->get('name')),
            'display_name' => $request->get('display_name'),
            'description' => $request->get('description')
        ]);

        // update pivot table
        $permission_ids = [];
        foreach ($request->get('permissions') as $permission) {
            $permission_ids[] = $permission['id'];
        }
        $roles->syncPermissions($permission_ids);

        return $this->sendResponse($roles, 'Role Created Successfully');
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
        $roles = $this->role->findOrFail($id);

        $roles->update($request->all());

        // update pivot table
        $permission_ids = [];
        foreach ($request->get('permissions') as $permission) {
            $permission_ids[] = $permission['id'];
        }
        $roles->syncPermissions($permission_ids);

        return $this->sendResponse($roles, 'Role Information has been updated');
    }

     public function destroy($id)
    {

        $this->authorize('isAdmin');

        $roles = $this->role->findOrFail($id);

        $roles->delete();

        return $this->sendResponse($roles, 'Role has been Deleted');
    }
}