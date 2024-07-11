<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDateRequest;
use App\Http\Requests\UpdateDateRequest;
use App\Models\Date;

use Illuminate\Database\QueryException;
// use Illuminate\Http\Request;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dates = Date::all();
        return view('dates.index', compact('dates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDateRequest $request)
    {
        Date::create($request->all());
        return redirect()->route('date.index')->with('success','Date Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Date $date)
    {
        return view('dates.edit', compact('date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDateRequest $request, Date $date)
    {
        $date->update($request->all());
        return redirect()->route('date.index')->with('success','Dates Successfully Updated'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Date $date)
    {
        try{
            $date->delete();
            return redirect()->route('date.index')->with('success', 'Date deleted successfully.');
        }catch(QueryException $e){
            if($e->getCode() === "23000"){
                return redirect()->route('date.index')->with('error', 'Date could not be delete because has in Date_showtime');
            }
        }
    }
}
