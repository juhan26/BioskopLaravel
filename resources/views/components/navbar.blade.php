<nav class="border-gray-200 bg-sky-700 border shadow-lg">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <h1>
            <a href="{{ route('home') }}"
                class="font-bold text-xl text-gray-50 focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">
                {{ config('app.name') }}
            </a>
        </h1>
        <button data-collapse-toggle="navbar-hamburger" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-50 rounded-lg hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-hamburger" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full" id="navbar-hamburger">
            @if (Route::has('login'))
                <ul class="flex flex-col font-medium mt-4 rounded-lg  bg-sky-700 dark:bg-gray-800 dark:border-gray-700">
                    @auth
                        <li class="my-2">
                            <a href="{{ route('profile') }}"
                                class="flex items-center text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">
                                <span class="font-bold">{{ auth()->user()->username }}</span>
                                <span
                                    class="ml-2 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                    Balance: Rp {{ number_format(auth()->user()->balance) }}
                                </span>
                            </a>
                        </li>
                        {{-- <li class="my-2">
                            <a href="{{ route('bookings.index') }}"
                                class="font-semibold text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">
                                Bookings
                            </a>
                        </li> --}}
                        <li class="my-2">
                            <a href="{{ route('showtimes.index') }}"
                                class="font-semibold text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">
                                Showtimes
                            </a>
                        </li>
                        <li class="my-2">
                            <a href="{{ route('date.index') }}"
                                class="font-semibold text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">
                                Dates
                            </a>
                        </li>
                        <li class="my-2">
                            <a href="{{ route('dateshowtime.index') }}"
                                class="font-semibold text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">
                                Date Showtimes
                            </a>
                        </li>
                        <li class="my-2">
                            <a href="{{ route('seat.index') }}"
                                class="font-semibold text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-rose-500">
                                Seats
                            </a>
                        </li> 
                        <li class="my-2">
                            <a href="{{ route('booking.index') }}"
                                class="font-semibold text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-rose-500">
                                Bookings
                            </a>
                        </li> 
                        <li class="my-2">
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit"
                                    class="font-semibold text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-sky-700">
                                    Log out
                                </button>
                            </form>
                        </li>

                        <li class="my-2">
                            <a href="{{ route('home') }}"
                                class="font-semibold text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-rose-500">
                                Movies
                            </a>
                        </li> 
                    @else
                        <li class="my-2">
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-sky-700">
                                Log in
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="my-2">
                                <a href="{{ route('register') }}"
                                    class="font-semibold text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-sky-700">
                                    Register
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>
            @endif
        </div>
    </div>
</nav>
