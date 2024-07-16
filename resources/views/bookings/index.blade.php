@extends('layouts.app')

@section('content')
<section id="booking-lists" class="p-6 max-w-screen-lg mx-auto">
    <h1 class="text-3xl font-bold mb-8 text-center">
        Bookings
    </h1>

    <div class="w-full lg:w-1/2 lg:p-2 mb-4 lg:mb-0">
        <a href="{{ route('booking.create') }}" class="px-4 py-2 bg-sky-700 text-white rounded-md shadow-sm hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-700 focus:ring-offset-2">
            Create Bookings
        </a>
    </div>

    <div class="container mx-auto py-8">
        <div class="flex flex-wrap gap-4">
            @foreach($bookings as $booking)
            <div class="bg-white shadow-lg rounded-lg p-4 flex flex-col w-72">
                <img class="rounded-lg mb-4" style="width: 100%; height: auto; object-fit: cover;" src="{{ asset('storage/' . $booking->movie->poster_url) }}" alt="{{ $booking->movie->title }}" />
                <div class="flex flex-col justify-between flex-grow">
                    <div>
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ mb_strimwidth($booking->movie->title, 0, 20, '...') }}
                        </h5>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white mt-2">
                            Date and Showtime:
                        </h3>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ \Carbon\Carbon::parse($booking->dateshowtimes->date->date)->format('l, d F Y') }} {{ $booking->dateshowtimes->showtime->start_time }} - {{ $booking->dateshowtimes->showtime->end_time }}
                        </p>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-1">
                            Seat Numbers
                        </h3>
                        <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                            {{ $booking->seats->seat_number }}
                        </span>
                    </div>
                    <div class="flex justify-end mt-4">
                        <form action="{{ route('booking.destroy', $booking) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2" onclick="return confirm('Are you sure you want to delete this item?');">
                                Cancel Booking
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    
    
    
</section>
@endsection
