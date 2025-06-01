<nav class="bg-gray-900 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- KIRI: Logo + Menu -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <div class="shrink-0">
                    @if (Auth::user()->role === 'dokter')
                        <a href="{{ route('dokter.dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-white" />
                        </a>
                    @elseif(Auth::user()->role === 'pasien')
                        <a href="{{ route('pasien.dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-white" />
                        </a>
                    @endif
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex space-x-6">
                    @if (Auth::user()->role === 'dokter')
                        <x-nav-link :href="route('dokter.dashboard')" :active="request()->routeIs('dokter.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('dokter.jadwal-periksa.index')" :active="request()->routeIs('dokter.jadwal-periksa.index')">
                            {{ __('Jadwal Periksa') }}
                        </x-nav-link>
                        <x-nav-link :href="route('dokter.obat.index')" :active="request()->routeIs('dokter.obat.*')">
                            {{ __('Obat') }}
                        </x-nav-link>
                    @elseif (Auth::user()->role === 'pasien')
                        <x-nav-link :href="route('pasien.dashboard')" :active="request()->routeIs('pasien.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- KANAN: Dropdown Nama -->
            <div class="hidden sm:flex sm:items-center sm:ms-auto">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-white hover:text-gray-300 focus:outline-none transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->nama }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path d="M5.25 7.5L10 12.25L14.75 7.5H5.25Z" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Info Akun -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ ucfirst(Auth::user()->role) }} - {{ Auth::user()->email }}
                        </div>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation (Mobile) -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (Auth::user()->role === 'dokter')
                <x-responsive-nav-link :href="route('dokter.dashboard')" :active="request()->routeIs('dokter.dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dokter.jadwal-periksa.index')" :active="request()->routeIs('dokter.jadwal-periksa.index')">
                    {{ __('Jadwal Periksa') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dokter.obat.index')" :active="request()->routeIs('dokter.obat.*')">
                    {{ __('Obat') }}
                </x-responsive-nav-link>
            @elseif (Auth::user()->role === 'pasien')
                <x-responsive-nav-link :href="route('pasien.dashboard')" :active="request()->routeIs('pasien.dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Dropdown -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="text-base font-medium text-white">{{ Auth::user()->nama }}</div>
                <div class="text-sm font-medium text-gray-300">{{ Auth::user()->email }}</div>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="mt-3 space-y-1">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                                       onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>
