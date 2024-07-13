@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4 mt-4">Date Showtime</h2>
    <a href="{{ url('/dateshowtime/create') }}" class="px-4 py-2 bg-sky-700 text-white rounded-md shadow-sm hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-700 focus:ring-offset-2">Add Date Showtimes</a>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg " style="margin-top: 2rem">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    {{-- <th scope="col" class="px-6 py-3">
                        Movie
                    </th> --}}
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Showtime
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Action
                    </th>
                   
                </tr>
            </thead>
            <tbody>
                @forelse ($dateshowtimes as $index => $dateshowtime)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $index + 1 }}
                    </th>
                    {{-- <td class="px-6 py-4">
                        {{ $dateshowtime->movies->title ?? 'No movie found' }}
                    </td> --}}
                    <td class="px-6 py-4">
                        {{ $dateshowtime->date->date ?? 'No date found' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $dateshowtime->showtime->start_time }} - {{ $dateshowtime->showtime->end_time }}
                    </td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ url("/dateshowtime/edit", $dateshowtime->id) }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 dark:focus:ring-yellow-900">Edit</a>
                        <form action="{{ route("dateshowtime.destroy", $dateshowtime->id) }}" method="POST" class="delete-form">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No date showtime Found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
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
