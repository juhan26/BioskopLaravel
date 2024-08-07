<form action="{{ route('home') }}" method="GET">
    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
        Search
    </label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            {{-- <svg aria-hidden="true" class="mr-3 w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg> --}}
        </div>
        <input type="search" id="search" name="search"
            class="ml-4 block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-sky-700 focus:border-sky-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-700 dark:focus:border-sky-700"
            placeholder="Search movie " value="{{ request('search') }}">
        <button type="submit"
            class="mb-2 text-white absolute right-2.5 bottom-2.5 bg-sky-700 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-sky-700 dark:hover:bg-sky-800 dark:focus:ring-sky-900">Search</button>
    </div>
</form>
