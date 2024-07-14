<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtisteController extends Controller
{
    //
   public function index(){
    $artistes = Artiste::orderByDesc('created_at')->paginate(5);

    $auth = Auth::user();

    $countArtistes = Artiste::count();

    return view('admin.artistes.index', compact('artistes', 'auth','countArtistes'));
   }
}
