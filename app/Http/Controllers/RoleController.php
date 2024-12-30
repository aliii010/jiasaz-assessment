<?php

namespace App\Http\Controllers;

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
        $roles = Role::all();
        $permissions = Permission::all();
        return view('roles-and-permissions', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create-role');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Role::create(['name' => $request->name]);
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('roles.edit-role', ['role' => Role::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Role::find($id)->update(['name' => $request->name]);
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);

        if ($role->name === 'admin') {
            return redirect()->route('roles.index')->with('error', 'The admin role cannot be deleted.');
        }

        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }

    public function showAssignPermissionForm(string $roleId)
    {
        $role = Role::find($roleId);
        $permissions = Permission::all();
        return view('roles.assign-permission', compact('role', 'permissions'));
    }

    public function assignPermission(string $roleId, string $permissionId)
    {
        $role = Role::find($roleId);
        $permission = Permission::find($permissionId);
        $role->givePermissionTo($permission);
        return redirect()->route('roles.index');
    }

    public function removePermission(string $roleId, string $permissionId)
    {
        $role = Role::find($roleId);
        $permission = Permission::find($permissionId);
        $role->revokePermissionTo($permission);
        return redirect()->route('roles.index');
    }
}
