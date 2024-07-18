<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudioRequest;
use App\Http\Requests\UpdateStudioRequest;
use App\Models\Seat;
use Illuminate\Database\QueryException;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Ambil semua data studio
    $studios = Studio::all();

    // Array untuk menyimpan nama-nama studio yang sudah ada
    $existingStudios = [];

    // Filter studio untuk menampilkan nama yang unik
    $filteredStudios = $studios->filter(function ($studio) use (&$existingStudios) {
        if (in_array($studio->name, $existingStudios)) {
            return false;
        } else {
            $existingStudios[] = $studio->name;
            return true;
        }
    });

    // Kirim data studio yang sudah difilter ke view
    return view('studios.index', ['studios' => $filteredStudios]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seats = Seat::all();
        return view('studios.create', compact('seats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudioRequest $request)
    {

        $data = $request->validated();
        if (is_array($request->seat_id)) {
            // Loop through each seat_id
            foreach ($request->seat_id as $seat_id) {
                // Create a new booking for each seat_id
                Studio::create([
                    // 'movie_id' => $data['movie_id'],
                    'name' => $data['name'],
                    'seat_id' => $seat_id,
                ]);
            }
        } else {
            // Create a booking if seat_id is not an array (fallback case)
            Studio::create($request->all());
        }
        
        return redirect()->route('studios.index')->with('success', 'Studio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Studio $studio)
{
    // Ambil kursi yang terkait dengan studio ini
    $seats = Seat::all() ;

    // Kirim data studio dan kursi ke view
    return view('studios.show', compact('studio', 'seats'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Studio $studio)
    {
        $seats = Seat::all();
        return view('studios.edit', compact('studio','seats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudioRequest $request, Studio $studio)
    {
        $studio->update($request->all());
        return redirect()->route('studios.index')->with('success', 'Studio updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Studio $studio)
    {
        try {
            // Ambil semua studio dengan nama yang sama
            $studiosWithSameName = Studio::where('name', $studio->name)->get();
    
            // Hapus semua studio tersebut
            foreach ($studiosWithSameName as $studioToDelete) {
                $studioToDelete->delete();
            }
    
            return redirect()->route('studios.index')->with('success', 'Studios with the same name deleted successfully.');
        } catch (QueryException $e) {
            if ($e->getCode() === "23000") {
                return redirect()->route('studios.index')->with('error', 'Studios could not be deleted because they have related records.');
            }
        }
    }
}
