<div class="relative max-w-xl bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
    <a href="{{ route('movies.show', $movie->id) }}"> 
        <img class="rounded-t-lg w-full h-90 object-cover" src="{{ asset('storage/' . $movie->poster_url) }}" alt="{{ $movie->title }}" />
    </a>
    
    <div class="p-6">
        <a href="{{ route('movies.show', $movie->id) }}"> 
            <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ mb_strimwidth($movie->title, 0, 30, '...') }}
            </h5>
        </a>

        <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">
            {{ mb_strimwidth($movie->description, 0, 100, '...') }}
        </p>
    </div>

    <div class="flex flex-wrap p-4">
        <x-movie-info :movie="$movie" />
    </div>

    <div class="flex justify-between items-center p-4 bg-gray-100 dark:bg-gray-700 rounded-b-lg">
        <a href="{{ route('movies.edit', $movie->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">Edit</a>
        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Delete</button>
        </form>
    </div>
</div>
