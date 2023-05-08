<div class="text-center">
    <form wire:submit.prevent="submit">
        <div wire:loading wire:target="image">Uploading...</div>
        <div lass="mb-4">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="blogs_slug">
                Blogs Slug
            </label>
            <input type="text" id="blogs_slug" wire:model="blogs_slug" class="border-gray-300 rounded-md shadow-sm">
            @error('blogs_slug') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="global_author">
                Global Author
            </label>
            <input type="text" id="global_author" wire:model="global_author" class="border-gray-300 rounded-md shadow-sm">
            @error('global_author') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="global_keywords">
                Global Keywords
            </label>
            <input type="text" id="global_keywords" wire:model="global_keywords" class="border-gray-300 rounded-md shadow-sm">
            @error('global_keywords') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="global_description">
                Global Description
            </label>
            <input type="text" id="global_description" wire:model="global_description" class="border-gray-300 rounded-md shadow-sm">
            @error('global_description') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="image">
                Image
            </label>
            <input type="file" id="image" wire:model="image" class="border-gray-300 rounded-md shadow-sm">
            @error('image') <span class="error">{{ $message }}</span> @enderror
        </div>
        @if ($image)
            Image Preview:
            <img src="{{ $image->temporaryUrl() }}" class="mx-auto">
        @endif
        @if ($old_image != null)
            <div class="mb-4 content-center">
                <label class="block text-gray-700 font-bold mb-2" for="old_image">
                    Old Image
                </label>
                <img id="old_image" src="{{ $old_image }}" alt="{{ $title }}" class="mx-auto">
            </div>
        @endif
        <button type="submit">Save Blog</button>
    </form>
</div>
