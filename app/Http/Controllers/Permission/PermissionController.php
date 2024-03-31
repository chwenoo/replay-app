<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        if (!Gate::allows('permission_list')) {
            return abort('401');
        }

        $permissions = Permission::all();
        return view('permission.index', compact('permissions'));
    }

    public function create()
    {
        if (!Gate::allows('permission_create')) {
            return abort('401');
        }

        return view('permission.create');
    }

    public function store(Request $request)
    {
        Permission::create([
            'name' => $request->name,
        ]);
        return redirect()->route('permissions.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(int $id)
    {
        if (!Gate::allows('permission_edit')) {
            return abort('401');
        }
    }

    public function update(Request $request, int $id)
    {
        //
    }

    public function destroy(int $id)
    {
        if (!Gate::allows('permission_delete')) {
            return abort('401');
        }
    }
}
