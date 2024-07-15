@extends('layouts.app')

@section('content')
    <section id="edit-movie" class="p-6 max-w-screen-lg mx-auto">
        <div class="bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 p-6">
            <h2 class="text-2xl font-bold mb-4">Edit Movie</h2>

            <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $movie->title) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >{{ old('description', $movie->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="poster_url" class="block text-sm font-medium text-gray-700">Poster</label>
                    @if(isset($movie) && $movie->poster_url)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="Current Poster" class="h-32 w-auto mb-4">
                    </div>
                @endif
                    <input type="file" name="poster_url" id="poster_url" class="mt-1 block ml-4 pr-5 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" value="{{ old('poster_url') }}">
                </div>
                

                <div class="mb-4">
                    <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date</label>
                    <input type="date" name="release_date" id="release_date" value="{{ old('release_date', $movie->release_date->format('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                </div>

                <div class="mb-4">
                    <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                    <input type="text" name="genre" id="genre" value="{{ old('genre', $movie->genre) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                </div>

                <div class="mb-4">
                    <label for="age_rating" class="block text-sm font-medium text-gray-700">Age Rating</label>
                    <input type="text" name="age_rating" id="age_rating" value="{{ old('age_rating', $movie->age_rating) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                </div>

                <div class="mb-4">
                    <label for="ticket_price" class="block text-sm font-medium text-gray-700">Ticket Price</label>
                    <input type="number" name="ticket_price" id="ticket_price" value="{{ old('ticket_price', $movie->ticket_price) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                </div>                

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-sky-700 text-white rounded-md shadow-sm hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                        Update Movie
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
