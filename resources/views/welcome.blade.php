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