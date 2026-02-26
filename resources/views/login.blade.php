<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-xl border border-slate-100">
        <h2 class="text-3xl font-bold text-center mb-8 text-slate-900">Login to Your Account</h2>
        <form method="POST" action="{{ route('login') }}" class="space-y-2">
            @csrf

            <x-input name="email" label="Email Address" type="email" placeholder="Enter Your Email" />
            <x-input name="password" label="Password" type="password" placeholder="Enter Your Password" />

            <div class="pt-4">
                <x-button type="submit" class="w-full justify-center py-4 text-lg">
                    Sign In
                </x-button>
            </div>

            <p class="text-center mt-6 text-sm text-slate-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-indigo-600 font-semibold hover:text-indigo-500">Register here</a>
            </p>
        </form>        
    </div>
</x-guest-layout>