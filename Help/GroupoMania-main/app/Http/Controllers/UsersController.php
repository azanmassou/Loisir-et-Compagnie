<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $querry = User::query();

        $users = $querry->isnotadmin()->recentuser()->paginate(3);

        // User::create([
        //     'name' => 'Happy',
        //     'password' => Hash::make('0000'),
        //     'email' => 'azanmassouhappylouis@gmail.com'
        // ]);
        // Post::create([
        //     'title' => 'Big Jaeger',
        //     'content' => "Hello world world from the google website,
        //     'image' => '1714206843.jpeg'
        // ]);

        return view('admin.users', compact('users'));
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

        return view('admin.user', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //

        $user = Auth::user();

        return view('adminer.views.profile-edite', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChangePasswordRequest $request, User $user)
    {
        //
        $credentials = $request->validated();

        if ($credentials['password'] !== $credentials['passwords']) {

            return to_route('users.edit')->withInput(['current'])->withErrors([
                'password' => 'Les mots de password sont pas identique',
                'passwords' => 'Les mots de password sont pas identique',
            ])->with('#chang-pwd');
        }

        // if ($credentials['password'] !== $user->password) {

        //     return to_route('users.edit',['user' => $user])->withInput(['current'])->withErrors([
        //         'current' => 'Please ... Enter Correct Password',
        //         // 'passwords' => 'Les mots de password sont pas identique',
        //     ])->with('return', '#chang-pwd');
        // }

        if (Hash::check($credentials['password'], $user->password)) {
            return to_route('users.edit', ['user' => $user])->withInput(['current'])->withErrors([
                'current' => 'Please ... Enter Correct Password',
                // 'passwords' => 'Les mots de password sont pas identique',
            ])->with('return', '#chang-pwd');
        }

        // $user->update(['password' => $credentials['password']]);

        // dd($user->update(['password' => $credentials['password']]));

        // return to_route('users.edit',['user' => $user])->withInput(['current'])->withErrors([
        //     'current' => 'Le mots de password est incorrect',
        //     'passwords' => 'Les mots de password sont pas identique',
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //

        // dd($user);

        $user->delete();

        return to_route('users.index');
    }

    public function block(User $user)
    {

        dd($user);

        if ($user->is_blocked) {

            $user->is_blocked = false;

            $user->save();
        } else {

            $user->is_blocked = true;

            $user->save();
        }

        return back();
    }
 

    public function admining(Request $request, User $user)
    {

        if ($request->input('role') === null) {

            return back()->withInput(['role'])->withErrors(
                [
                    'role' => "Please ... Choose a valid role"
                ]
            );
        }

        // dd($user->role->id, $request->input('role'));

        if ($user->role->id === $request->input('role')) {

            return back()->withInput(['role'])->withErrors(
                [
                    'role' => "Please ... This role is already assigned"
                ]
            );
        }

        $user->role_id = $request->input('role');

        $user->save();

        return back()->with('success', " $user->role");
    }
}
