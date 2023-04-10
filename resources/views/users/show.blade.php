<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="text-center">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="id">
                            Id
                        </label>
                        <input type="text" id="id" disabled class="border-gray-300 rounded-md shadow-sm" value="{{ $user->id }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="name">
                            Name
                        </label>
                        <input type="text" id="name" disabled class="border-gray-300 rounded-md shadow-sm" value="{{ $user->name }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="email">
                            Email
                        </label>
                        <input type="text" id="email" disabled class="border-gray-300 rounded-md shadow-sm" value="{{ $user->email }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="roles">
                            Roles
                        </label>
                        <input type="text" id="roles" disabled class="border-gray-300 rounded-md shadow-sm" value="{{ $user->getRoleNames()->implode(', ') }}">
                    </div>
                    @if ($user->profile_photo_path != null)
                    <div class="mb-4 content-center">
                        <label class="block text-gray-700 font-bold mb-2" for="photo">
                            Profile Photo
                        </label>
                        <img id="photo" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="mx-auto rounded-full h-20 w-20 object-cover">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>