<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $auth = Auth::user();

        return view('admin.reservations.index', compact('auth'));
    }
    public function newReservation(Salle $salle)
    {
        //
        $auth = Auth::user();

        return view('admin.reservations.create', compact('auth','salle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Salle $salle)
    {
        //
        $auth = Auth::user();

        dd($salle->id);

        return view('admin.reservations.create', compact('salle', 'auth'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        //
        $credentials = $request->validated();

        $reservation = Reservation::create($credentials);

        session()->flash('success');

        return back();

        // return view('admin.reservations.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
