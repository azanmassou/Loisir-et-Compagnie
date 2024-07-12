<?php

namespace App\Http\Controllers;

use App\Http\Requests\RollingRoleRequest;
use App\Models\Role;
// use App\Http\Requests\StoreRoleRequest;
// use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::orderByDesc('created_at')->paginate(6);

        $auth = Auth::user();

        $countRoles = Role::count();

        return view('admin.roles.index', compact('roles', 'auth','countRoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $auth = Auth::user();
        
        return view('admin.roles.create', compact('auth'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RollingRoleRequest $request)
    {
        // 

        $credentials = $request->validated();

        $role = Role::create($credentials);

        // dd($role);

        $roles = Role::orderByDesc('created_at')->paginate(6);

        session()->flash('success');

        $countRoles = Role::count();

        $auth = Auth::user();

        return to_route('roles.index');

        // return response()->json([
        //     'message' => 'Données enregistrées avec succès!',
        //     // 'request' => request()->name,
        //     // 'roles' => $roles,
        //     'role' => $role,
        //     // 'auth' => $auth,
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
        $auth = Auth::user();

        return view('admin.roles.show', compact('auth', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
        $auth = Auth::user();

        return view('admin.roles.edit',compact('role', 'auth'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RollingRoleRequest $request, Role $role)
    {
        //
        $credentials = $request->validated();

        $role->update($credentials);

        session()->flash('success');

        return to_route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
 // Detach users associated with this role
 $role->users()->detach();

        $role->delete();

        $roles = Role::orderByDesc('created_at')->paginate(3);

        $countRoles = Role::count();

        $auth = Auth::user();

        session()->flash('success');

        return view('admin.roles.index', compact('roles', 'auth','countRoles'));
        // return to_route('roles.index');
    }
    public function usersListing(Role $role)
    {
        //
    $users = $role->user()->paginate(3);

        // $roles = Role::orderByDesc('created_at')->paginate(3);

        // $countRoles = Role::count();

        $auth = Auth::user();

        return view('admin.roles.users', compact('auth','users','role'));
    }
}
