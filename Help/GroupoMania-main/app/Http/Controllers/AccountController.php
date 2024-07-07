<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //

    public function privacy_setting(){

        $user = Auth::user();

        return view('adminer.views.privacy-setting', compact('user'));

    }
    public function account_setting(){

        $user = Auth::user();

        return view('adminer.views.account-setting', compact('user'));

    }
}
