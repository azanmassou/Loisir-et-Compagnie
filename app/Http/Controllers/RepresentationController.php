<?php

namespace App\Http\Controllers;

use App\Models\Representation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepresentationController extends Controller
{
    //
   public function index(){

    $representations = Representation::orderByDesc('created_at')->paginate(7);

    $auth = Auth::user();

    $countRepresentations = Representation::count();

    return view('admin.representations.index', compact('representations', 'auth','countRepresentations'));
   }
}
