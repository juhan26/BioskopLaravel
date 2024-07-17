@extends('layouts.app')

@section('content')
    <section class="w-full p-6 max-w-7xl mx-auto lg:p-8">
        <div class="bg-white rounded-lg shadow-md p-5">
            <h2 class="text-2xl font-bold mb-4">{{ $studio->name }}</h2>
            <p><strong>Seat ID:</strong> {{ $seat->id }}</p>
            <p><strong>Seat Number:</strong> {{ $seat->number }}</p>
            <p><strong>Seat Description:</strong> {{ $seat->description }}</p>
        </div>
    </section>
@endsection
