@extends('layouts.app')

@section('content')
    <section id="create-seat" class="w-full p-6 max-w-7xl mx-auto lg:p-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Create Seat</h2>
            <form action="{{ route('seat.store') }}" method="POST">
                @csrf  
                <div class="mb-4">
                    <label for="seat_number" class="block text-sm font-medium text-gray-700">Seat Number</label>
                    <input type="text" name="seat_number" id="seat_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>                           
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create Seat</button>
                </div>
            </form>
        </div>
    </section>
@endsection
