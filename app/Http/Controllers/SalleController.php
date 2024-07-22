<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalleRequest;
use App\Http\Requests\UpdateSalleRequest;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $salles = Salle::orderByDesc('created_at')->paginate(5);

        $auth = Auth::user();

        $countSalles = Salle::count();

        return view('admin.salles.index', compact('salles', 'auth', 'countSalles'));
    }
    public function create()
    {
        //
        $auth = Auth::user();

        return view('admin.salles.create', compact('auth'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalleRequest $request)
    {
        //
        $credentials = $request->validated();

        $auth = Auth::user();

        $salle = Salle::create($credentials);

        session()->flash('success');

        return view('admin.salles.show', compact('salle', 'auth'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Salle $salle)
    {
        //
        $auth = Auth::user();

        return view('admin.salles.show', compact('salle', 'auth'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalleRequest $request, Salle $salle)
    {
        //
        $credentials = $request->validated();

        $salle->update($credentials);

        session()->flash('success');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salle $salle)
    {
        //
        if ($salle->representation()->count() > 0) {

            session()->flash('error');

            return back();
        }

        $salle->delete();

        session()->flash('success');

        return to_route('salles.index');
    }
}
