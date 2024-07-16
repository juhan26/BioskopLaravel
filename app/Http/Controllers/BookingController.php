<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Dateshowtime;
use App\Models\Movie;
use App\Models\Seat;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with('movie')->get();
        $seats = Seat::all();
        // dd($bookings->pluck('movie'));
        return view('bookings.index', compact('bookings', 'seats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::all();
        $dateshowtimes = Dateshowtime::all();
        $seats = Seat::all();

        // dd($movies);

        return view('bookings.create', compact('movies', 'dateshowtimes', 'seats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        // dd($request->all());
        $data = collect($request->validated());
        // $booking = Booking::create($request->all());
        if (is_array($request->seat_id)) {
            foreach ($request->seat_id as $seat_id) {
                $data->put('seat_id', $seat_id);
                Booking::create($data->toArray());
            }
        } else {
            Booking::create($data->toArray());
        }

        return redirect()->route('booking.index')->with('success', 'Booking created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            $booking->delete();
            return redirect()->route('booking.index')->with('success', 'Booking deleted successfully.');
        }

        return redirect()->route('booking.index')->with('error', 'Booking not found.');
    }
}
