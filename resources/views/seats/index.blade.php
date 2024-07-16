@extends('layouts.app')

@section('content')
<div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
<h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4 mt-4">Seats</h2>
<a href="{{ url('/seat/create') }}" class="px-4 py-2 mb-4 bg-sky-700 text-white rounded-md shadow-sm hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-700 focus:ring-offset-2">Add Seats</a>
<div class="grid grid-cols-8 gap-4 mt-8">
    @foreach ($seats as $seat)
        <div>
            <label for="seat_id" class="inline-flex items-center cursor-pointer">
                <input type="checkbox" name="seat_id" id="seat_id"
                    value="{{ $seat->id }}"
                    class="form-checkbox h-4 w-4 text-sky-700 border-gray-300 rounded focus:ring-sky-700"
                    >
                <span
                    class="lg:ml-2  ? 'text-red-500' : 'text-gray-900 dark:text-white' }}">
                    {{ $seat->seat_number }}
                </span>
            </label>
        </div>
    @endforeach
</div>
<div class="px-3 py-2 my-6 text-xs font-bold text-center text-white bg-gray-500 rounded-lg">
    SCREEN
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const confirmed = confirm('Are you sure you want to delete this data?');
                if (confirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
