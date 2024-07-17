<nav class="border-gray-200 bg-sky-700 border shadow-lg">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
        <h1>
            <a href="{{ route('home') }}"
                class="font-bold text-xl text-gray-50 focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">
                {{ config('app.name') }}
            </a>
        </h1>
        <div class="flex items-center space-x-4">
            <ul class="flex space-x-4 font-medium">
                @auth
                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-50 hover:bg-sky-800">Movies</a>
                    </li>
                    <li class="{{ request()->routeIs('booking.index') ? 'active' : '' }}">
                        <a href="{{ route('booking.index') }}" class="block px-4 py-2 text-sm text-gray-50 hover:bg-sky-800">Bookings</a>
                    </li>
                    <li class="{{ request()->routeIs('showtimes.index') ? 'active' : '' }}">
                        <a href="{{ route('showtimes.index') }}" class="block px-4 py-2 text-sm text-gray-50 hover:bg-sky-800">Showtimes</a>
                    </li>
                    <li class="{{ request()->routeIs('date.index') ? 'active' : '' }}">
                        <a href="{{ route('date.index') }}" class="block px-4 py-2 text-sm text-gray-50 hover:bg-sky-800">Dates</a>
                    </li>
                    <li class="{{ request()->routeIs('dateshowtime.index') ? 'active' : '' }}">
                        <a href="{{ route('dateshowtime.index') }}" class="block px-4 py-2 text-sm text-gray-50 hover:bg-sky-800">Date Showtimes</a>
                    </li>
                    <li class="{{ request()->routeIs('seat.index') ? 'active' : '' }}">
                        <a href="{{ route('seat.index') }}" class="block px-4 py-2 text-sm text-gray-50 hover:bg-sky-800">Seats</a>
                    </li>
                @endauth
            </ul>

        

            @if (Route::has('login'))
                <ul class="flex items-center space-x-4 font-medium">
                    @auth
                        <li class="relative">
                            <button onmouseover="toggleDropdown()" class="flex items-center text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">
                                <span class="font-bold">{{ auth()->user()->username }}</span>
                            </button>
                            <div id="dropdown" class="hidden absolute right-0 bg-sky-800 mt-2 rounded-lg shadow-lg z-50">
                                <ul>
                                    <li><a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-50 hover:bg-sky-700">Profile</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="block w-full text-left px-4 py-2 text-sm text-gray-50 hover:bg-sky-7jx00">
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-sky-700">
                                Log in
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li>
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

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }

    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdown');
        const button = document.querySelector('button[onclick="toggleDropdown()"]');

        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
