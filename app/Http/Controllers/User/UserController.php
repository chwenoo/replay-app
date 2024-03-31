<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        if (!Gate::allows('user_list')) {
            return abort(401);
        }

        $users = User::with('roles')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        if (!Gate::allows('user_create')) {
            return abort(401);
        }
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    public function store(StoreRequest $request)
    {
        $request->validated();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
        ]);

        $user->assignRole($request->role);
        return redirect()->route('users.index');
    }

    public function show(int $id)
    {
        //
    }

    public function edit(int $id)
    {
        if (!Gate::allows('user_edit')) {
            return abort(401);
        }

        $user = User::with('roles')->where('id', $id)->first();
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = User::where('id', $id)->first();

        // Updaemail and email
        $user->name = $request->name;
        $user->email = $request->email;

        // Remove existing roles
        $user->roles()->detach();

        if($request->has('role')) {
            $user->assignRole($request->role);
        }
        // Update password if provided
        if ($request->password) {
            $request->validate(['password' => ['confirmed'],]);

            $user->password = Hash::make($request->password);
        }

        // Save the updated user
        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy(int $id)
    {
        if (!Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::find($id);
        return $user->delete();
    }
}
