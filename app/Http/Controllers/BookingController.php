<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Dateshowtime;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\Showtime;
use App\Models\Studio;
use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with('movie')->get();
        $seats = Seat::all();

        // Menghitung kursi yang tersedia
        $availableSeats = $seats->filter(function ($seat) {
            return !$seat->bookings->count();
        })->count();

        $bookedSeats = $seats->count();
        // dd($bookings->pluck('movie'));
        return view('bookings.index', compact('bookings', 'availableSeats', 'seats', 'bookedSeats'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {
        $movies = Movie::all();
        $dateshowtimes = Dateshowtime::all();

        $seats = Seat::all();

        $studios = Studio::all();

        // Dapatkan ID showtime yang dipilih
        $selectedShowtimeId = $request->input('showtime');

        // Dapatkan semua kursi yang telah dipesan untuk showtime dan film yang dipilih
        $bookedSeats = Booking::where('dateshowtime_id', $selectedShowtimeId)
            ->pluck('seat_id')
            ->toArray();

        // Filter kursi yang belum ter-booking
        $availableSeats = $seats->filter(function ($seat) use ($bookedSeats) {
            return !in_array($seat->id, $bookedSeats);
        });

        $selectedShowtime = Dateshowtime::find($request->showtime);
        $selectedMoviePrice = $selectedShowtime->movies;
        $ticketPrice = $selectedMoviePrice->ticket_price;

        $total = $ticketPrice * count($bookedSeats);

        $selectedMovie = Movie::find($request->movie);

        return view('bookings.create', compact('movies', 'dateshowtimes', 'seats', 'selectedShowtime', 'selectedMovie', 'availableSeats', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     */

    //      public function showBooking($movieId, $showtimeId)
    // {
    //     $selectedMovie = Movie::find($movieId);
    //     $selectedShowtime = Showtime::find($showtimeId);
    //     $studio = $selectedShowtime->studio;
    //     $seats = $studio->seats;

    //     return view('bookings', compact('selectedMovie', 'selectedShowtime', 'seats'));
    // }

    public function store(StoreBookingRequest $request)
    {
        $data = $request->validated();
        $bookings = [];

        // Check if seat_id is an array
        if (is_array($request->seat_id)) {
            // Loop through each seat_id
            foreach ($request->seat_id as $seat_id) {
                // Create a new booking for each seat_id
                $booking = Booking::create([
                    'movie_id' => $data['movie_id'],
                    'dateshowtime_id' => $data['dateshowtime_id'],
                    'seat_id' => $seat_id,
                ]);
                $bookings[] = $booking;
            }
        } else {
            // Create a booking if seat_id is not an array (fallback case)
            $booking = Booking::create($data);
            $bookings[] = $booking;
        }

        // Load the related models for each booking
        foreach ($bookings as $booking) {
            $booking->load('movie', 'dateshowtime', 'seat');
        }

        // Prepare data for QR code
        $firstBooking = $bookings[0];
        $showtimeData = json_decode($firstBooking->dateshowtime->date, true);

        if ($firstBooking->movie && $showtimeData) {
            // Make sure start_time and end_time are properly handled
            $showtimeDate = $showtimeData['date'] ?? 'N/A';
            $showtimeStart = $showtimeData['start_time'] ?? 'N/A';
            $showtimeEnd = $showtimeData['end_time'] ?? 'N/A';

            $seats = collect($bookings)->pluck('seat.seat_number');
            $ticketPrice = $firstBooking->movie->ticket_price;
            $totalPrice = $ticketPrice * $seats->count();

            // Generate the QR code
            $qrCode = QrCode::create("Booking ID: {$firstBooking->id}\nMovie: {$firstBooking->movie->title}\nShowtime: {$showtimeDate} {$showtimeStart} - {$showtimeEnd}\nSeats: " . $seats->implode(', '))
                ->setSize(300);

            $writer = new PngWriter();
            $qrCodeImage = base64_encode($writer->write($qrCode)->getString());

            return view('bookings.details', [
                'firstBooking' => $firstBooking,
                'qrCodeImage' => $qrCodeImage,
                'showtimeDate' => $showtimeDate,
                'showtimeStart' => $showtimeStart,
                'showtimeEnd' => $showtimeEnd,
                'seats' => $seats->implode(', '),
                'totalPrice' => $totalPrice,
            ]);
        } else {
            return redirect()->route('movies.index')->with('error', 'Failed to load booking details.');
        }
    }








    public function showBookingDetails($bookingId)
    {
        $booking = Booking::find($bookingId);
        $selectedMovie = $booking->movie;
        $selectedShowtime = $booking->showtime;
        $seats = $booking->seats;
        $availableSeats = Seat::where('is_booked', false)->get();
        $total = $booking->total;

        $qrCode = QrCode::create("Booking ID: $booking->id\nMovie: $selectedMovie->title\nShowtime: $selectedShowtime->date->date $selectedShowtime->showtime->start_time - $selectedShowtime->showtime->end_time\nSeats: " . $seats->pluck('seat_number')->implode(', '))
            ->setSize(300);

        $writer = new PngWriter();
        $qrCodeImage = base64_encode($writer->write($qrCode)->getString());

        return view('booking.details', compact('selectedMovie', 'selectedShowtime', 'seats', 'availableSeats', 'total', 'qrCodeImage'));
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
