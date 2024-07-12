<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Http\Requests\StoreSeatRequest;
use App\Http\Requests\UpdateSeatRequest;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seats = Seat::all();
        return view('seats.index', compact('seats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeatRequest $request)
    {
        Seat::create($request->all());
        return redirect()->route('seat.index')->with('success','Seat Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seat $seat)
    {
        return view('seats.edit', compact('seat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeatRequest $request, Seat $seat)
    {
        $seat->update($request->all());
        return redirect()->route('seat.index')->with('success','Seat Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seat $seat)
    {
        try{
            $seat->delete();
            return redirect()->route('seat.index')->with('success', 'Seat deleted successfully.');
        }catch(QueryException $e){
            if($e->getCode() === "23000"){
                return redirect()->route('seat.index')->with('error', 'Seat could not be delete because has in Date_showtime');
            }
        }
    }
}
