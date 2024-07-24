@extends('layouts.app')

@section('content')
    <section id="filter" class="w-full p-6 max-w-7xl mx-auto lg:p-8">
        <div class="flex flex-col lg:flex-row justify-center">
            <div class="w-full lg:w-1/2 lg:p-2 mb-4 lg:mb-0">
                <a href="{{ route('studios.create') }}" class="px-4 py-2 bg-sky-700 text-white rounded-md shadow-sm hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-700 focus:ring-offset-2">
                    Create Studio
                </a>
            </div>
        </div>
    </section>

    <section id="studio-list" class="p-6 mx-auto max-w-7xl lg:p-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($studios as $studio)
            <div class="bg-white rounded-lg shadow-md p-5">
                <h5 class="text-xl font-bold mb-2">{{ $studio->name }}</h5>
                <div class="flex justify-between items-center">
                    <a href="{{ route('studios.show', $studio->id) }}" class="bg-indigo-100 text-indigo-600 hover:bg-indigo-200 hover:text-indigo-900 font-semibold py-2 px-4 rounded border border-indigo-600 hover:border-indigo-900 transition-colors mr-2 ">Detail</a>
                    <form action="{{ route('studios.destroy', $studio->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-100 text-red-600 hover:bg-red-200 hover:text-red-900 font-semibold py-2 px-4 rounded border border-red-600 hover:border-red-900 transition-colors">Delete</button>
                    </form>
                </div>
            </div>
            
                {{-- <div class="flex justify-between items-center p-3 bg-gray-100 dark:bg-gray-700 rounded-b-lg">
                    
                </div> --}}
            @endforeach
        </div>
    </section>
@endsection
