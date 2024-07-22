@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-8 text-3xl font-bold text-gray-900 dark:text-white">
            Studio
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
            <form action="{{ route('studios.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Studio Name
                        </label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                        {{-- <input type="hidden" name="studio_id"> --}}
                    </div>
                </div>
            
                <div class="mt-4">
                    <button type="button" id="select-all" class="px-4 py-2 bg-green-500 text-white rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Select All
                    </button>
                </div>
            
                <div class="grid grid-cols-8 gap-4 mt-6">
                    @foreach ($seats as $seat)
                    <div>
                        <label for="seat_id_{{ $seat->id }}" class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="seat_id[]" id="seat_id_{{ $seat->id }}" value="{{ $seat->id }}" class="sr-only peer">
                            <div
                            class="w-10 h-10 text-gray-800 font-bold flex items-center justify-center border border-gray-400 rounded-lg 'bg-gray-200 peer-checked:bg-sky-600 peer-checked:border-sky-600 peer-checked:text-white cursor-pointer'">
                            {{ $seat->seat_number }}
                        </div>
                        </label>
                    </div>
                @endforeach
                
                </div>
            
                <div class="px-3 py-2 my-6 text-xs font-bold text-center text-white bg-gray-500 rounded-lg">
                    SCREEN
                </div>
            
                <div class="mt-4 flex justify-end">
                    <button type="submit" class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                        Submit
                    </button>
                </div>
            </form>
            
            <script>
                document.getElementById('select-all').addEventListener('click', function() {
                    var checkboxes = document.querySelectorAll('input[type="checkbox"][name="seat_id[]"]');
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = true;
                    });
                });
            </script>
            
@endsection
