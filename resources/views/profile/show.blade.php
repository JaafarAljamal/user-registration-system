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
                            Edit Profile
                        </x-button>
                    </div>
                </div>
            </div>

            <div id="edit-bio-section" class="hidden p-6 bg-white shadow sm:rounded-lg">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div>
                        <div>
                            @if(Auth::user()->profile->avatar)
                                <img id="preview" src="{{ asset('storage/' . Auth::user()->profile->avatar) }}" class="h-16 w-16 rounded-full object-cover border">
                            @else
                                <div id="placeholder" class="h-16 w-16 rounded-full bg-slate-200 flex items-center justify-center">
                                    <svg class="h-8 w-8 text-slate-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                </div>
                                <img id="preview" class="hidden h-16 w-16 rounded-full object-cover border">
                            @endif
                        </div>
                        <div>
                            <label for="avatar" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 cursor-pointer">
                                {{ __('Change photo') }}
                                <input type="file" name="avatar" id="avatar" class="hidden">
                            </label>
                            <p class="text-xs text-slate-500">JPG, PNG (Max 2MB)</p>
                        </div>
                    </div>

                    <label for="bio" class="block font-medium text-slate-700 mb-2 mt-2">Update Your Bio</label>
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
                <button type="button" onclick="showModal()" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                    Delete Account
                </button>
            </div>
            <x-confirmation-modal />
        </div>
    </div>
</x-app-layout>
