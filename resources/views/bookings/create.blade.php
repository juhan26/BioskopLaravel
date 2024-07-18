@extends('layouts.app')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-8 text-3xl font-bold text-gray-900 dark:text-white">
                Booking Details
            </h2>
            
            @if ($errors->any())
                <div id="flash-message" x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
                    class="fixed top-12 left-1/2 transform -translate-x-1/2 z-50 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg
                    shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">    
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
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
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif
            
            <div x-data="{ tab: 'studio1' }">
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="movie_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Movie
                            </label>
                            <select name="movie_id" id="movie_id" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" >
                                @forelse ($movies as $movie)
                                    <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                                @empty
                                    <option value="">No movies available</option>
                                @endforelse
                            </select>
                        </div>
                        
                        <div class="sm:col-span-2">
                            <label for="dateshowtime_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Date Showtime
                            </label>
                            <select name="dateshowtime_id" id="dateshowtime_id" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" >
                                @forelse ($dateshowtimes as $dateshowtime)
                                    <option value="{{ $dateshowtime->id }}">{{ $dateshowtime->date->date }} : {{ $dateshowtime->showtime->start_time }}-{{ $dateshowtime->showtime->end_time }}</option>
                                @empty
                                    <option value="">No dates available</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
{{--             
                    <ul class="mt-4 hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
                        <li class="w-full focus-within:z-10">
                            <a href="#" @click.prevent="tab = 'studio1'" :class="{ 'text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-white': tab === 'studio1', 'hover:text-gray-700 hover:bg-gray-50 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700': tab !== 'studio1' }" class="inline-block w-full p-4 border-r border-gray-200 dark:border-gray-700 rounded-s-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none">
                                Studio 1
                            </a>
                        </li>
                        <li class="w-full focus-within:z-10">
                            <a href="#" @click.prevent="tab = 'studio2'" :class="{ 'text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-white': tab === 'studio2', 'hover:text-gray-700 hover:bg-gray-50 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700': tab !== 'studio2' }" class="inline-block w-full p-4 border-r border-gray-200 dark:border-gray-700 focus:ring-4 focus:ring-blue-300 focus:outline-none">
                                Studio 2
                            </a>
                        </li>
                    </ul>
             --}}
                    <div x-show="tab === 'studio1'">
                        {{-- Content for Studio 1 --}}
                        <div class="grid grid-cols-8 gap-4 mt-6">
                            @foreach ($seats as $seat)
                                <div>
                                    <label for="seat_id_{{ $seat->id }}" class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="seat_id[]" id="seat_id_{{ $seat->id }}"
                                            value="{{ $seat->id }}"
                                            class="form-checkbox h-4 w-4 text-sky-700 border-gray-300 rounded focus:ring-sky-700"
                                            @if ($seat->isBooked($movies->first(), $dateshowtimes->first()))
                                                disabled
                                            @endif>
                                        <span class="lg:ml-2 text-gray-900 dark:text-white">
                                            @if ($seat->isBooked($movies->first(), $dateshowtimes->first()))
                                                <span class="text-red-600">{{ $seat->seat_number }}</span>
                                            @else
                                                {{ $seat->seat_number }}
                                            @endif
                                        </span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    
                        <div class="px-3 py-2 my-6 text-xs font-bold text-center text-white bg-gray-500 rounded-lg">
                            SCREEN
                        </div>
                        @error('seats')
                            <x-error-message :message="$message" />
                        @enderror
                    </div>
            
                    <div class="mt-4 flex justify-end">
                        <button type="submit" class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                            Submit
                        </button>
                    </div>
                </form>
            </div>            
        </div>
    </section>
@endsection