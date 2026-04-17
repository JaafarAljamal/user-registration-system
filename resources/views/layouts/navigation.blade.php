<nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center font-bold text-indigo-600">
                    MyApplication
                </div>
                <div class="hidden space-x-8 sm:-mx-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')"  :active="request()->routeIs('dashboard')" >
                        Home
                    </x-nav-link>

                    <x-nav-link :href="route('profile.show')" :active="request()->routeIs('profile.show')">
                        Profile
                    </x-nav-link>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-slate-600">{{ Auth::user()->username }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold transition-colors">
                        Logout
                    </button>
                </form>
            </div>
            <div class="-me-2 flex items-center sm:hidden">
                <button id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path id="hamburger-icon" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div id="mobile-menu" class="hidden sm:hidden bg-white border-t border-slate-200">
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                Home
            </x-nav-link>
            <x-nav-link :href="route('profile.show')" :active="request()->routeIs('profile.show')" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                Profile
            </x-nav-link>
        </div>
    </div>
</nav>