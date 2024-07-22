@extends('layouts.app')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-8 text-3xl font-bold text-gray-900 dark:text-white">
                Booking Details
            </h2>

            @if ($selectedMovie)
                <section id="movie-details" class="p-6 max-w-screen-lg mx-auto">
                    <div class="flex flex-col items-center justify-center bg-white border border-gray-200 rounded-lg shadow-md w-full max-w-screen-lg mx-auto md:flex-row md:max-w-7xl dark:border-gray-700 dark:bg-gray-800">
                        <img class="ml-4 object-cover w-full h-auto md:w-1/2 md:h-full rounded-t-lg md:rounded-none md:rounded-l-lg" src="{{ asset('storage/' . $selectedMovie->poster_url) }}" alt="{{ $selectedMovie->title }}" />
                        <div class="flex flex-col justify-between p-4 leading-normal md:w-1/2">
                            <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $selectedMovie->title }}
                            </h5>
                            <div class="flex flex-wrap my-3">
                                <x-movie-info :movie="$selectedMovie" />
                            </div>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 opacity-3">
                                {{ $selectedMovie->description }}
                            </p>

                            @if ($selectedShowtime)
                                <div class="mt-4">
                                    <h6 class="mb-2 text-2xl font-semibold text-gray-900 dark:text-white">Showtime</h6>
                                    <p class="text-gray-700 dark:text-gray-400">{{ $selectedShowtime->date->date }} : {{ $selectedShowtime->showtime->start_time }} - {{ $selectedShowtime->showtime->end_time }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @endif

            @if ($errors->any())
                <div id="flash-message" x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
                    class="fixed top-12 left-1/2 transform -translate-x-1/2 z-50 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg
                    shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    @foreach ($errors->all() as $error)
                        <div class="ml-3 text-sm font-normal">
                            {{ $error }}
                        </div>
                    @endforeach
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#flash-message" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif

            <div class="flex space-x-4">
                <!-- Available Seats Section -->
                <div class="pt-3 py-2 pl-4 max-w-fit bg-white border border-gray-200 rounded-lg shadow-md dark:border-gray-700 dark:bg-gray-800">
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-1">
                        Available Seats
                        <span class="bg-100 text-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                            <span class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                {{ $availableSeats->count() }}
                            </span>
                        </span>
                    </h3>
                </div>

                <!-- Total Section -->
                <div class="pt-3 py-2 pl-4 max-w-fit bg-white border border-gray-200 rounded-lg shadow-md dark:border-gray-700 dark:bg-gray-800">
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-1">
                        Total
                        <span class="bg-100 text-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                            <span class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                {{ number_format($total) }}
                            </span>
                        </span>
                    </h3>
                </div>
            </div>

            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <input type="hidden" name="movie_id" id="movie_id" value="{{ $selectedMovie->id }}">
                <input type="hidden" name="dateshowtime_id" value="{{ $selectedShowtime->id }}">

                <div class="grid grid-cols-8 gap-4 mt-6">
                    @foreach ($seats as $seat)
                        @php
                            $isDisabled = $seat->isBooked($selectedMovie->id, $selectedShowtime->id);
                        @endphp

                        <div>
                            <label for="seat_id_{{ $seat->id }}" class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="seat_id[]" id="seat_id_{{ $seat->id }}"
                                    value="{{ $seat->id }}" class="sr-only peer" {{ $isDisabled ? 'disabled' : '' }}>

                                <div
                                    class="w-10 h-10 text-gray-800 font-bold flex items-center justify-center border border-gray-400 rounded-lg
                                    {{ $isDisabled ? 'text-white bg-red-600 border-red-600 cursor-not-allowed' : 'bg-gray-200 peer-checked:bg-sky-600 peer-checked:border-sky-600 peer-checked:text-white cursor-pointer' }}">
                                    {{ $seat->seat_number }}
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="flex items-center mt-6">
                    <button type="submit"
                        class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                        Book Now
                    </button>
                </div>
            </form>

            @if(isset($qrCodeImage))
                <div class="mt-6 flex justify-center">
                    <img src="data:image/png;base64,{{ $qrCodeImage }}" alt="Booking QR Code">
                </div>
            @endif
        </div>
    </section>
@endsection