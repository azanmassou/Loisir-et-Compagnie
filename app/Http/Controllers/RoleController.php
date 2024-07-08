<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
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
        $roles = Role::orderByDesc('created_at')->paginate(3);

        $auth = Auth::user();

        return view('admin.roles.index', compact('roles', 'auth'));
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
    public function store(StoreRoleRequest $request)
    {
        // Log::info('Store method called');

        $credentials = $request->validated();

        $auth = Auth::user();

        //  $role = Role::create($credentials);
        Role::create($credentials);

        $roles = Role::orderByDesc('created_at')->paginate(3);

        session()->flash('success');

        // Pour obtenir le nombre total de rôles
        // $countRoles = Role::count();

        // echo "Nombre total de rôles : " . $countRoles;

        return view('admin.roles.index', compact('roles', 'auth'));

        // Log::info('Data validated', $credentials);

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

        $users = $role->user()->orderByDesc('created_at')->paginate(7);

        // dd($users);

        return view('admin.roles.show', compact('users', 'auth'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
        // dd($role);

        $auth = Auth::user();

        return to_route('roles.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
        dd($role);

        return to_route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //

        $auth = Auth::user();

        $role->delete();

        $roles = Role::orderByDesc('created_at')->paginate(3);

        session()->flash('success');

        return view('admin.roles.index', compact('roles', 'auth'));
    }
}
