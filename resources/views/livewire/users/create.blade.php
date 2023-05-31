<div class="w-fill block">
    <form wire:submit.prevent="submit">

        <div class="flex flex-row flex-wrap -mx-4 items-stretch">
            <div class="w-full px-4">
                @if (session()->has('message'))
                    <div class="text-green-500 font-bold text-lg md:text-2xl">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="name">Name</label>
                <input type="text" id="name" wire:model="name" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('name') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="email">Email</label>
                <input type="text" id="email" wire:model="email" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('email') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="password">Password</label>
                <input type="password" id="password" wire:model="password" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('password') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>
            
            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="role">Role</label>
                <select id="role" wire:model="role" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                    <option value="no_role">No role</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                    @endforeach
                </select>
                @error('role') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-4 py-2">
                <div class="flex flex-row justify-between items-center w-full pt-2">
                    <div>
                        <button type="submit" class="inline-block text-center border border-blue-500 rounded-md min-h-[42px] h-auto py-2.5 p-5 text-white bg-blue-500 text-base font-medium leading-tight hover:bg-blue-400 hover:border-blue-400 transition ease-in-out duration-200">Save User</button>
                    </div>

                    <div>
                        <a href="{{ route('user.index') }}" class="inline-block text-center border border-blue-500 rounded-md min-h-[42px] h-auto py-2.5 p-5 text-blue-500 bg-white text-base font-medium leading-tight hover:bg-blue-400 hover:border-blue-400 hover:text-white transition ease-in-out duration-200">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>