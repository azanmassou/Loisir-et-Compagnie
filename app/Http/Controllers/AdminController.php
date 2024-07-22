<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function admin()
    {
        //
        $auth = Auth::user();

        return view('admin.index', compact('auth'));
    }
    // public function user()
    // {
    //     //
    //     $auth = Auth::user();

    //     $salles = Salle::paginate(3);

    //     return view('users.index', compact('auth','salles'));
    // }

}
