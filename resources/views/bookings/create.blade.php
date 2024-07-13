@extends('layouts.app')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-8 text-3xl font-bold text-gray-900 dark:text-white">
                Booking Details
            </h2>
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="movie_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Movie
                        </label>
                        <select name="movie_id" id="movie_id" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @forelse ($movies as $movie)
                                <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                            @empty
                                <option value="">No movies available</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="dateshowtime_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Date
                        </label>
                        <select name="dateshowtime_id" id="dateshowtime_id" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @forelse ($dateshowtimes as $dateshowtime)
                                <option value="{{ $dateshowtime->date->date }}">{{ $dateshowtime->date->date }}</option>
                            @empty
                                <option value="">No dates available</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="showtime" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Showtime
                        </label>
                        <select name="dateshowtime_id" id="dateshowtime_id" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @forelse ($dateshowtimes as $dateshowtime)
                                <option value="{{ $dateshowtime->id }}">{{ $dateshowtime->showtime->start_time }} - {{ $dateshowtime->showtime->end_time }}</option>
                            @empty
                                <option value="">No showtimes available</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                {{-- seat lists --}}
                <div class="grid grid-cols-8 gap-4 mt-6">
                    @foreach ($seats as $seat)
                        <div>
                            <label for="seat_id" class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="seat_id" id="seat_id"
                                    value="{{ $seat->id }}"
                                    class="form-checkbox h-4 w-4 text-sky-700 border-gray-300 rounded focus:ring-sky-700"
                                    >
                                <span
                                    class="lg:ml-2  ? 'text-red-500' : 'text-gray-900 dark:text-white' }}">
                                    {{ $seat->seat_number }}
                                </span>
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="px-3 py-2 my-6 text-xs font-bold text-center text-white bg-gray-500 rounded-lg">
                    SCREEN
                </div>
                @error('seats')
                    <x-error-message :message="$message" />
                @enderror

                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-sky-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-sky-800">
                    Book Now
                </button>
            </form>
        </div>
    </section>
@endsection
