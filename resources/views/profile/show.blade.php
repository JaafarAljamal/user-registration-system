<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div id="profile-info" class="bg-white p-6 shadow sm:rounded-lg">
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-slate-900">User Information</h3>

                    <div class="mt-6 space-y-4">
                        <div>
                            <span class="block font-bold text-slate-700">Name:</span>
                            <span class="text-slate-600">{{ Auth::user()->username }}</span>
                        </div>

                        <div>
                            <span class="block font-bold text-slate-700">Email:</span>
                            <span class="text-slate-600">{{ Auth::user()->email }}</span>
                        </div>

                        <div>
                            <span class="block font-bold text-slate-700">Bio:</span>
                            <span class="text-slate-600">{{ Auth::user()->profile->bio ?? 'No bio available yet.' }}</span>
                        </div>

                        <x-button id="show-edit-form">
                            Edit Bio
                        </x-button>
                    </div>
                </div>
            </div>

            <div id="edit-bio-section" class="hidden p-6 bg-white shadow sm:rounded-lg">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')

                    <label for="bio" class="block font-medium text-slate-700 mb-2">Update Your Bio</label>
                    <textarea
                        name="bio"
                        id="bio"
                        rows="4"
                        class="w-full border-slate-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('bio') border-red-500 @enderror"
                    > {{ old('bio', $user->profile->bio) }} </textarea>

                    @error('bio')
                        <p class="text-red-600 text-xs mt-1 font-medium">{{ $message }}</p>
                    @enderror

                    <div class="mt-4 flex items-center gap-4">
                        <x-button type="submit">Save</x-button>
                        <button type="button" id="hide-edit-form" class="text-sm text-slate-600 hover:text-slate-900">Cancel</button>
                    </div>
                </form>
            </div>

            <div class="p-6 bg-white shadow sm:rounded-lg border-l-4 border-red-500">
                <h3 class="text-lg font-medium text-red-600 mb-4">Delete your account:</h3>
                <form method="POST" action="{{ route('account.destroy') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">Delete Account</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

