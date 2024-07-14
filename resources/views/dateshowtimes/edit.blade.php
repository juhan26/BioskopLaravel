{{-- @extends('layouts.app')

@section('content')
    <section id="create-showtimes" class="w-full p-6 max-w-7xl mx-auto lg:p-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Edit Date Showtimes</h2>
            <form action="{{ route('dateshowtime.update') }}" method="POST">
                @csrf  
                <div class="mb-4">
                    <label for="movie_id" class="block text-sm font-medium text-gray-700">Movie</label>
                    <select name="movie_id" id="movie_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($movies as $movie)
                            <option value="{{ $movie->id }}"{{ old('movie_id', $movie->title) }}>{{ $movie->title }}</option>
                        @endforeach
                    </select>
                </div>

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
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create Movie</button>
                </div>
            </form>
        </div>
    </section>
@endsection --}}
@extends('layouts.app')

@section('content')
    <section id="edit-showtimes" class="w-full p-6 max-w-7xl mx-auto lg:p-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Edit Date Showtimes</h2>
            @if ($errors->any())
        <div id="flash-message" x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
                class="fixed top-12 left-1/2 transform -translate-x-1/2 z-50 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg
                shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">    
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            @foreach ($errors->all() as  $error)
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
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        </div>
            @endif
            <form action="{{ route('dateshowtime.update', $dateshowtime->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                {{-- <div class="mb-4">
                    <label for="movie_id" class="block text-sm font-medium text-gray-700">Movie</label>
                    <select name="movie_id" id="movie_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($movies as $movie)
                            <option value="{{ $movie->id }}" {{ $dateshowtime->movie_id == $movie->id ? 'selected' : '' }}>{{ $movie->title }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="mb-4">
                    <label for="date_id" class="block text-sm font-medium text-gray-700">Date</label>
                    <select name="date_id" id="date_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($dates as $date)
                            <option value="{{ $date->id }}" {{ $dateshowtime->date_id == $date->id ? 'selected' : '' }}>{{ $date->date }}</option>
                        @endforeach
                    </select>
                </div>
                             
                <div class="mb-4">
                    <label for="showtime_id" class="block text-sm font-medium text-gray-700">Showtime</label>
                    <select name="showtime_id" id="showtime_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @forelse($showtimes as $showtime)
                            <option value="{{ $showtime->id }}" {{ $dateshowtime->showtime_id == $showtime->id ? 'selected' : '' }}>{{ $showtime->start_time }} - {{ $showtime->end_time }}</option>
                        @empty
                            <option value="">Showtime not found</option>
                        @endforelse
                    </select>
                </div>               
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update Date & Showtimes</button>
                </div>
            </form>
        </div>
    </section>
@endsection
