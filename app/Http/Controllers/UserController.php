<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\UpdateRoleUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::orderByDesc('created_at')->paginate(7);
        $auth = Auth::user();

        return view('admin.users.index', compact('users', 'auth'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        $roles = Role::all();

        $auth = Auth::user();

        return view('includes.profile', compact('user', 'auth', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return to_route("users.index");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleUserRequest $request, User $user)
    {
        //

        $credentials = $request->validated();

        // if ($user->role->id == $credentials) {

        //     return back()->withErrors([
        //         'role_id' => 'Oups ... L\'utilisateur possede deja le role !!!',
        //     ])->withInput(['role_id']);
        // }

        $credentials = $request->validated();

        $user->update($credentials);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        return to_route('users.index');
    }
}
