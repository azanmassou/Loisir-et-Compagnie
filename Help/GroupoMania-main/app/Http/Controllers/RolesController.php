<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

use App\Models\User;

use App\Http\Requests\AddRoleRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $roles = Role::paginate(3);

        return view('admin.role', compact('roles'));
      
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
    public function store(AddRoleRequest $request)
    {
        //

        // dd($request);

$credentials = $request->validated();

$roles = Role::Create($credentials);

        return back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $role->update();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //

        $role->delete();

        return back();
    }
    public function listing(Role $role)
    {
        //

        $querry = User::query();

        $users  = $querry->where('role_id', $role->id)->paginate(3);

        // $users = $role->user->;

      return view('admin.listing', compact('users'));
    }
}
