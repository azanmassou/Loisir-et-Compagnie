<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArtisteRequest;
use App\Http\Requests\UpdateArtisteRequest;
use App\Models\Artiste;
use App\Models\Spectacle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtisteController extends Controller
{
    //
    public function index()
    {
        $artistes = Artiste::orderByDesc('created_at')->paginate(5);

        $auth = Auth::user();

        $countArtistes = Artiste::count();

        return view('admin.artistes.index', compact('artistes', 'auth', 'countArtistes'));
    }

    public function show(Artiste $artiste)
    {
        //
        $auth = Auth::user();

        $spectacles = Spectacle::all();

        return view('admin.artistes.show', compact('artiste', 'auth', 'spectacles'));
    }

    public function store(StoreArtisteRequest $request, Artiste $artiste)
    {
        //
        $credentials = $request->validated();

        $auth = Auth::user();

        $artiste = Artiste::create($credentials);

        session()->flash('success');

        $spectacles = Spectacle::all();

        return view('admin.artistes.show', compact('auth','artiste','spectacles'));
    }
    
    public function create()
    {
        //
        $auth = Auth::user();

        // $artiste = new Artiste();

        return view('admin.artistes.create', compact( 'auth'));
    }


    public function update(UpdateArtisteRequest $request, Artiste $artiste)
    {
        //
        $credentials = $request->validated();

        $auth = Auth::user();

        $artiste->update($credentials);

        session()->flash('success');

        return back();
    }
}
