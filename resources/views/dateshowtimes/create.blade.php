@extends('layouts.app')

@section('content')
    <section id="create-showtimes" class="w-full p-6 max-w-7xl mx-auto lg:p-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Create Date Showtimes</h2>
            <form action="{{ route('dateshowtime.store') }}" method="POST">
                @csrf  
                {{-- <div class="mb-4">
                    <label for="movie_id" class="block text-sm font-medium text-gray-700">Movie</label>
                    <select name="movie_id" id="movie_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($movies as $movie)
                            <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="mb-4">
                    <label for="date_id" class="block text-sm font-medium text-gray-700">Date</label>
                    <select name="date_id" id="date_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($dates as $date)
                            <option value="{{ $date->id }}">{{ $date->date }}</option>
                        @endforeach
                    </select>
                </div>
                             
                <div class="mb-4">
                    <label for="showtime_id" class="block text-sm font-medium text-gray-700">showtime</label>
                    <select name="showtime_id" id="showtime_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @forelse($showtimes as $showtime)
                            <option value="{{ $showtime->id }}">{{ $showtime->start_time}} - {{ $showtime->end_time}}</option>
                        @empty
                        <option value="">Showtime not found</option>
                        @endforelse
                    </select>
                </div>               
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-sky-700 text-white rounded-md shadow-sm hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-700 focus:ring-offset-2">Create Movie</button>
                </div>
            </form>
        </div>
    </section>
@endsection
