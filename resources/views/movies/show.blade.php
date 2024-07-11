@extends('layouts.app')

@section('content')
    <section id="movie-details" class="p-6 max-w-screen-lg mx-auto">
        <div class="flex flex-col items-center justify-center bg-white border border-gray-200 rounded-lg shadow-lg w-full max-w-screen-lg mx-auto md:flex-row md:max-w-7xl dark:border-gray-700 dark:bg-gray-800">
            <img class="object-cover w-full rounded-t-lg md:rounded-none md:rounded-l-lg" src="{{ asset('storage/' . $movie->poster_url) }}" alt="{{ $movie->title }}" />
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $movie->title }}
                </h5>
                <div class="flex flex-wrap my-3">
                    <x-movie-info :movie="$movie" />
                </div>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{ $movie->description }}
                </p>
                <div class="flex justify-between">
                    <div>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </div>
                    <div>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Dates and showtimes list --}}
  <section id="dates-showtimes" class="p-6 max-w-screen-lg mx-auto">

        <div class="container mx-auto">
            <h2 class="text-3xl font-bold mb-4 text-center">
                Dates and Showtimes
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($movie->dates as $date)
                    <div class="border rounded-lg p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $date->date->format('D, d M Y') }}</h3>
                        <ul>
                            @foreach ($date->showtimes as $showtime)
                                <x-showtime-button :showtime="$showtime" :movie="$movie" :date="$date" :currentDate="$currentDate" :currentTime="$currentTime" />
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
