<div class="text-center">
    <form wire:submit.prevent="submit">
        <div lass="mb-4">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">
                Name
            </label>
            <input type="text" id="name" wire:model="name" class="border-gray-300 rounded-md shadow-sm">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Email
            </label>
            <input type="text" id="email" wire:model="email" class="border-gray-300 rounded-md shadow-sm">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="password">
                Password
            </label>
            <input type="password" id="password" wire:model="password" class="border-gray-300 rounded-md shadow-sm">
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="role">
                Role
            </label>
            <select id="role" wire:model="role" class="border-gray-300 rounded-md shadow-sm">
                <option value="no_role">No role</option>
                @foreach ($roles as $role)
                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>
            @error('role') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Save User</button>
    </form>
</div>
