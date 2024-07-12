<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        //
        $auth = Auth::user();

        return view('admin.index', compact('auth'));
    }

    // public function isBlocked(User $user)
    // {
    //     //

    //     dd($user);

    //     $user->isBlock = true;

    //     $user->update();

    //     $auth = Auth::user();

    //     return view('admin.users.show', compact('auth','user'));
    // }

}
