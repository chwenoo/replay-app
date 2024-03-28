<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreRequest $request)
    {
        $request->validated();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
        ]);
        return redirect()->route('users.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(int $id)
    {
        $user = User::where('id', $id)->first();
        return view('user.edit', compact('user'));
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
        $user = User::find($id);
        return $user->delete();
    }
}
