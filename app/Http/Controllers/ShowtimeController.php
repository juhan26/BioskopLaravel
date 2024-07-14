<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShowtimeRequest;
use App\Http\Requests\UpdateShowtimeRequest;
use Illuminate\Database\QueryException;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showtimes = Showtime::all();
        return view('showtimes.index', compact('showtimes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('showtimes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShowtimeRequest $request)
    {
        Showtime::create($request->all());
        return redirect()->route('showtimes.index')->with('success','Showtimes Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Showtime $showtime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Showtime $showtime)
    {
        return view('showtimes.edit', compact('showtime'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShowtimeRequest $request, Showtime $showtime)
    {
        $showtime->update($request->all());
        return redirect()->route('showtimes.index')->with('success','Showtimes Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Showtime $showtime)
    {
        try{
            $showtime->delete();
            return redirect()->route('showtimes.index')->with('success', 'Showtime deleted successfully.');
        }catch(QueryException $e){
            if($e->getCode() === "23000"){
                return redirect()->route('showtimes.index')->with('error', 'Showtime could not be delete because has in Date Showtime');
            }
        }
    }
}
