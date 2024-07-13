<?php

namespace App\Http\Controllers;

use App\Models\Dateshowtime;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDateshowtimeRequest;
use App\Http\Requests\UpdateDateshowtimeRequest;
use App\Models\Date;
use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Database\QueryException;

class DateshowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dateshowtimes = Dateshowtime::all();
        return view('dateshowtimes.index', compact('dateshowtimes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dates = Date::all();
        $showtimes = Showtime::all();
        $movies = Movie::all();
        return view('dateshowtimes.create', compact('dates','showtimes','movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDateshowtimeRequest $request)
    {
        Dateshowtime::create($request->all());
        return redirect()->route('dateshowtime.index')->with('success', 'Date & Showtime created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dateshowtime $dateshowtime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dateshowtime $dateshowtime)
    {
        $dates = Date::all();
        $showtimes = Showtime::all();
        // $movies = Movie::all();
        return view('dateshowtimes.edit', compact('dateshowtime','dates','showtimes', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDateshowtimeRequest $request, Dateshowtime $dateshowtime)
    {
        $dateshowtime->update($request->all());
        return redirect()->route('dateshowtime.index')->with('success', 'Date & Showtime updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dateshowtime $dateshowtime)
    {
        try{
            $dateshowtime->delete();
            return redirect()->route('dateshowtime.index')->with('success', 'Date Showtime deleted successfully.');
        }catch(QueryException $e){
            if($e->getCode() === "23000"){
                return redirect()->route('dateshowtime.index')->with('error', 'Date Showtime could not be delete because has in Date_showtime');
            }
        }
    }
}
