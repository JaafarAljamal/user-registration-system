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
        </div>
    </div>
</nav>