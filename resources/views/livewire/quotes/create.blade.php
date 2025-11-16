<div class="w-fill block" x-data="{ titleFocused: @entangle('titleFocused')}">
    <form wire:submit.prevent="saveQuote">

        <div class="flex flex-row flex-wrap -mx-4 items-stretch">
            <div class="w-full px-4">
                @if (session()->has('message'))
                    <div class="text-green-500 font-bold text-lg md:text-2xl">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="w-full px-4" wire:loading wire:target="coverImage">Uploading...</div>

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="coverImage">Cover image</label>
                <input type="file" id="coverImage" wire:model="coverImage" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('coverImage') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-4 py-2">
                @if ($coverImage)
                    coverImage Preview:
                    <img src="{{ $coverImage->temporaryUrl() }}" class="mx-auto">
                @endif
            </div>

            <div class="w-full px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="title">Author</label>
                <select id="author" wire:model="authorId" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                    <option value="">Select Author</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
                @error('authorId') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="quote">Quote</label>
                <textarea type="text" id="quote" wire:model="quote" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300" @focus="titleFocused = true" @click.away="titleFocused = false"></textarea>
                @error('quote') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="content">Source</label>
                <input type="text" id="source" wire:model="source" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('source') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            {{-- <div class="w-full md:w-3/4 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="slug">Slug</label>
                <input type="text" id="slug" wire:model="slug" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('slug') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div> --}}

            <div class="w-full md:w-1/4 px-4 py-2 wire:ignore">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="status">Status</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="status" class="sr-only peer" wire:model="status">
                    <div class="w-11 h-6 bg-red-500 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                </label>
                @error('status') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-4 py-2">
                <div class="flex flex-row justify-between items-center w-full pt-2">
                    <div>
                        <button type="submit" class="inline-block text-center border border-admin-main rounded-md min-h-[42px] h-auto py-2.5 p-5 text-white bg-admin-main text-base font-medium leading-tight hover:bg-admin-hover hover:border-admin-hover transition ease-in-out duration-200">Save Quote</button>
                    </div>

                    <div>
                        <a href="{{ route('quotes.adminIndex') }}" class="inline-block text-center border border-admin-main rounded-md min-h-[42px] h-auto py-2.5 p-5 text-admin-main bg-white text-base font-medium leading-tight hover:bg-admin-hover hover:border-admin-hover hover:text-white transition ease-in-out duration-200">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
