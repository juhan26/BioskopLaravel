@extends('layouts.app')

@section('content')
<section id="booking-details" class="p-6 max-w-screen-lg mx-auto">
    <div class="flex flex-col items-center justify-center bg-white border border-gray-200 rounded-lg shadow-lg w-full max-w-screen-lg mx-auto md:flex-row md:max-w-5xl dark:border-gray-700 dark:bg-gray-800">
        <img class="object-cover w-full h-64 md:h-auto md:w-1/3 rounded-t-md md:rounded-none md:rounded-l-md" src="{{ asset('storage/' . $firstBooking->movie->poster_url) }}" alt="{{ $firstBooking->movie->title }}" />
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $firstBooking->movie->title }}
            </h5>
            <div class="flex flex-wrap my-3">
                <p class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-100"><strong>Showtime:</strong> {{ $showtimeDate }} {{ $showtimeStart }} - {{ $showtimeEnd }}</p>
            </div>
            <p class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-100"><strong>Total:</strong> Rp.{{ number_format($totalPrice, 2) }}</p>
            <p class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-100"><strong>Seats:</strong> {{ $seats }}</p>
            <div class="mt-3 flex justify-center">
                <img src="data:image/png;base64,{{ $qrCodeImage }}" alt="QR Code" class="w-32 h-32">
            </div>
        </div>
    </div>
</section>
@endsection
