<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('views-Role',Role::class);
        $roles = Role::all();
        
        return response()->json([
            'status' => 'success',
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create-Role',Role::class);

        $role = Role::create([
            'name' => $request->nameOfRole,
            'guard_name' => 'api'
        ]);

        return response()->json([
            'message' => 'Role Added Successfuly',
            'role' => $role
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::findorfail($id);

        $this->authorize('show-Role',Role::class);

        return response()->json(['role' => $role]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $role = Role::findorfail($id);

        $this->authorize('update-Role',$role);

        $role->update([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => true,
            'message' => 'success updated role',
            'role' => $role
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::findorfail($id);

        $this->authorize('delete-Role',$role);


        $role->delete();

        return response()->json(['message' => 'Role Deleted Successfuly']);
        
    }

    public function assignPermissions(Request $request)
    {
        $this->authorize('assignPermissions', Role::class);

        $role = Role::findorfail($request->role_id);

        $permission = Permission::findorfail($request->permission_id);

        $role->givePermissionTo($permission);

        return response()->json(['message' => 'Permission assigned successfuly']);
    }

    public function assignRole(Request $request)
    {
        $this->authorize('assignRole', Role::class);

        $user = User::where('id', $request->user_id)->first();

        $role = Role::findorfail($request->role_id);

        $user->assignRole($role);

        return response()->json(['message' => 'Role assigned successfuly']);
    }

    public function RemovePermissions(Request $request)
    {
        $this->authorize('RemovePermissions', Role::class);

        $role = Role::findorfail($request->role_id);

        $permission = Permission::findorfail($request->permission_id);

        $role->revokePermissionTo($permission);

        return response()->json(['message' => 'Permission removed successfuly']);
    }

    public function RemoveRole(Request $request)
    {
        $this->authorize('RemoveRole', Role::class);

        $user = User::findorfail($request->user_id);
        $role = Role::findorfail($request->role_id);

        $user->removeRole($role);

        return response()->json(['message' => 'Role removed successfuly']);
    }

    public function ShowPermissionsOfaRole(Request $request)
    {
        $this->authorize('ShowPermissionsOfaRole', Role::class);

        $role = Role::findorfail($request->role_id);

        $permissions = $role->permissions;

        return response()->json(['message' => $permissions]);
    }

    public function ShowRolesOfaPermissions(Request $request)
    {
        $this->authorize('ShowRolesOfaPermissions', Role::class);
        
        $user = User::findorfail($request->user_id);

        $roles = $user->getRoleNames();

        return response()->json(['roles' => $roles]);
    }
}
