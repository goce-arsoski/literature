<div class="w-full block">
    <form wire:submit.prevent="submit">
        <div class="flex flex-row flex-wrap -mx-4">
            <div class="w-full px-4 py-2">
                <div wire:loading wire:target="brand_logo">Uploading...</div>
                <div wire:loading wire:target="image">Uploading...</div>
                <div lass="mb-4">
                    @if (session()->has('message'))
                        <div class="text-green-500 font-bold text-lg md:text-2xl">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="brand_logo">Brand Logo</label>
                <input type="file" id="brand_logo" wire:model="brand_logo" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('brand_logo') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="brand_text">Brand Text</label>
                <input type="text" id="brand_text" wire:model="brand_text" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('global_author') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="blogs_slug">Blogs Slug</label>
                <input type="text" id="blogs_slug" wire:model="blogs_slug" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('blogs_slug') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full md:w-1/2 px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="global_author">Global Author</label>
                <input type="text" id="global_author" wire:model="global_author" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('global_author') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full  px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="global_keywords"> Global Keywords</label>
                <textarea type="text" id="global_keywords" wire:model="global_keywords" class="w-full h-32 border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300"></textarea>
                @error('global_keywords') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="global_description">Global Description</label>
                <textarea type="text" id="global_description" wire:model="global_description" class="w-full h-32 border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300"></textarea>
                @error('global_description') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="image">Image</label>
                <input type="file" id="image" wire:model="image" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('image') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>
            @if ($image)
            <div class="w-full px-4 py-2">
                <p class="block text-neutral-800 font-medium text-base mb-1">Image preview</p>
                <img src="{{ $image->temporaryUrl() }}" class="w-auto max-w-full h-auto inline-block">
            </div>
            @endif

            @if ($old_image != null)
            <div class="w-full px-4 py-2">
                <p class="block text-neutral-800 font-medium text-base mb-1">Previous image</p>
                <img id="old_image" src="{{ $old_image }}" class="w-auto max-w-full h-auto inline-block">
            </div>
            @endif

            <div class="w-full px-4 py-2">
                <button type="submit" class="inline-block text-center border border-admin-main rounded-md min-h-[42px] h-auto py-2.5 p-5 text-white bg-admin-main text-base font-medium leading-tight hover:bg-admin-hover hover:border-admin-hover transition ease-in-out duration-200">Save Blog Settings</button>
            </div>
        </div>


        
    </form>
</div>
