<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        if (!Gate::allows('role_list')) {
            return abort('401');
        }

        $roles = Role::with('permissions')->get();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        if (!Gate::allows('role_create')) {
            return abort('401');
        }

        $permissions = Permission::all();
        return view('role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
        ]);

        // $role->syncPermissions($request->permissions);

        foreach($request->permissions as $permission) {

            $role->givePermissionTo($permission);
        }
        return redirect()->route('roles.index');
    }

    public function show(int $id)
    {
        //
    }

    public function edit(int $id)
    {
        if (!Gate::allows('role_edit')) {
            return abort('401');
        }
    }

    public function update(Request $request, int $id)
    {
        //
    }

    public function destroy(int $id)
    {
        if (!Gate::allows('role_delete')) {
            return abort('401');
        }
    }
}
