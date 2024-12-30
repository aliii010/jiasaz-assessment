<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::all();
        $roles = Role::all();

        if ($request->has('role') && $request->role != '') {
            $users = User::role($request->role)->get();
        }


        return view('users.index', compact('users', 'roles'));
    }

    public function showUserRoles($userId)
    {
        $user = User::findOrFail($userId);
        $roles = Role::all();

        return view('users.roles', compact('user', 'roles'));
    }

    public function updateRoles($userId)
    {
        $user = User::findOrFail($userId);
        $user->syncRoles(request('roles'));
        return redirect()->route('users.index');
    }
}
