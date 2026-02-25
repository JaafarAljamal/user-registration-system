<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-xl">
        <h2 class="text-2xl font-bold text-center mb-6 text-slate-800">Create New Account</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-input name="username" label="Name" placeholder="Enter Your Name" />
            <x-input name="email" label="Email Address" type="email" placeholder="Enter Your Email" />
            <x-input name="password" label="Password" type="password" placeholder="Enter Your Password" />

            <div class="mt-6">
                <x-button type="submit" class="w-full justify-center">
                    Register Now
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>