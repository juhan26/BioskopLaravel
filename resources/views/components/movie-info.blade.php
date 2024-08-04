<span
    class="bg-blue-100 text-blue-800 text-sm font-medium m-0.5 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
    Released: {{ explode('-', $movie->release_date)[0] }}
</span>
<span
    class="bg-blue-100 text-blue-800 text-sm font-medium m-0.5 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
    Expired: {{ explode('-', $movie->expired_date)[0]}}
</span>
<span
    class="bg-pink-100 text-pink-800 text-sm font-medium m-0.5 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-pink-400 border border-pink-400">
    Age Rating: {{ $movie->age_rating }}
</span>
<span
    class="bg-yellow-100 text-yellow-800 text-sm font-medium m-0.5 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-400 border border-yellow-400">
    Genre: {{ ($movie->genre) }}
</span>
<span
    class="bg-green-100 text-green-800 text-sm font-medium m-0.5 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
    Price: Rp {{ number_format($movie->ticket_price) }}
</span>
<span
    class="bg-amber-100 text-amber-900 text-sm font-medium m-0.5 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
    {{ $movie->studios->name }}
</span>
{{-- <span
    class="bg-violet-100 text-violet-800 text-sm font-medium m-0.5 px-2.5 py-0.5 rounded dark:bg-violet-700 dark:text-violet-400 border border-violet-400">
    Avaible Seats : 35
</span> --}}
