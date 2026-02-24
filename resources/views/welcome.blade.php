<x-guest-layout>
    <div class="text-center">
        <h1 class="text-5xl font-extrabold tracking-tight text-slate-900 sm:text-6xl mb-6">
            <span class="text-indigo-600">User Registration System</span>
        </h1>
        <p class="mt-3 text-base text-slate-500 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl max-w-2xl mx-auto mb-10">
            A comprehensive platform providing a seamless and modern user experience for profile management, built with the latest technologies to ensure speed and security.
        </p>

        <div class="flex gap-4 justify-center mt-10">
            @if (Route::has('login'))
                @auth
                    <x-button href="{{ url('/home') }}">
                        🏠 Home
                    </x-button>
                @else
                    <x-button href="{{ route('login') }}" variant="secondary">
                        🔑 Login
                    </x-button>

                    @if (Route::has('register'))
                        <x-button href="{{ route('register') }}" variant="primary">
                            ✨ Register
                        </x-button>
                    @endif
                @endauth        
            @endif
        </div>
    </div>
</x-guest-layout>