@extends('layouts.app')

@section('content')
    <section id="booking-lists" class="p-6 max-w-screen-lg mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center">
            Bookings
        </h1>

        <div class="w-full lg:w-1/2 lg:p-2 mb-4 lg:mb-0">


            <a href="{{ route('booking.create') }}" class="px-4 py-2 bg-primary-500 text-white rounded-md shadow-sm hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                Create Bookings
            </a>

    </div>

        
            {{-- <x-booking-card :booking="$booking" /> --}}
            <div class="container mx-auto py-8">
                <div class="flex flex-col gap-6">
                    @foreach($bookings as $booking)
                    <div class="bg-white shadow-md rounded-lg p-4 flex">
                        <img class="rounded-t-lg w-full" style="width: 180px" src="{{ asset('storage/' . $booking->movie->poster_url) }}" alt="{{ $booking->movie->title }}" style="width: 20rem; height: 21rem;" />
                        <div class="ml-4 flex flex-col justify-center">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ mb_strimwidth($booking->movie->title, 0, 20, '...') }}
                            </h5>
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                Date and Showtime: 
                            </h3>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $booking->dateshowtimes->date->date }} {{ $booking->dateshowtimes->showtime->start_time }} - {{ $booking->dateshowtimes->showtime->end_time }}</p>
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                Seat Numbers
                            </h3>
                            <p class="text-gray-700 mb-1">{{ $booking->seats->seat_number }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
                        
            
    

        {{-- <div class="my-6">
            {{ $bookings->links() }}
        </div> --}}
    </section>
@endsection
