<?php

namespace App\Http\Controllers;

use App\Models\Spectacle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpectacleController extends Controller
{
    //
   public function index(){

    $spectacles = Spectacle::orderByDesc('created_at')->paginate(5);

    $auth = Auth::user();

    $countSpectacle = Spectacle::count();

    return view('admin.spectacles.index', compact('spectacles', 'auth','countSpectacle'));

   }
}
