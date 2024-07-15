@extends('layouts.app')

@section('content')
    <section id="create-movie" class="w-full p-6 max-w-7xl mx-auto lg:p-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Create New Movies</h2>
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
            <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf  
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ></textarea>
                </div>
                <div class="mb-4">
                    <label for="poster_url" class="block text-sm font-medium text-gray-700">Poster</label>
                    <input type="file" name="poster_url" id="poster_url" class="mt-1 block ml-4 pr-5 w-full text-smx     text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" >
                </div>
                <div class="mb-4">
                    <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date</label>
                    <input type="date" name="release_date" id="release_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                </div>
                <div class="mb-4">
                    <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                    <input type="text" name="genre" id="genre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                </div>
                <div class="mb-4">
                    <label for="age_rating" class="block text-sm font-medium text-gray-700">Age Rating</label>
                    <input type="text" name="age_rating" id="age_rating" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                </div>
                <div class="mb-4">
                    <label for="ticket_price" class="block text-sm font-medium text-gray-700">Ticket Price</label>
                    <input type="number" name="ticket_price" id="ticket_price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                </div>                
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-sky-700 text-white rounded-md shadow-sm hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-700 focus:ring-offset-2">Create Movie</button>
                </div>
            </form>
        </div>
    </section>
@endsection
