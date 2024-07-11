<div class="relative max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
    <a href="{{ route('movies.show', $movie->id) }}">
        <img class="rounded-t-lg w-full" src="{{ asset('storage/' . $movie->poster_url) }}" alt="{{ $movie->title }}" style="width: 20rem; height: 21rem"  />
    </a>
    <div class="p-5">
        <a href="{{ route('movies.show', $movie->id) }}">
            <h5 class="h-10 mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ mb_strimwidth($movie->title, 0, 20, '...') }}
            </h5>
        </a>
        <p class="h-10 mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ mb_strimwidth($movie->description, 0, 50, '...') }}
        </p>
    </div>

    <div class="flex flex-wrap m-3">
        <x-movie-info :movie="$movie" />
    </div>
    <div class="flex justify-between" style="">
        <div>
            <a href="{{ route('movies.edit', $movie->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
        </div>
        <div>
            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900" onclick="confirm('Apakah yakin ingin menghapus data ini?')">Delete</button>
            </form>
        </div>
    </div>
</div>
