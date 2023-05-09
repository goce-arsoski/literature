<div>
    <div>
        <label class="block text-gray-700 font-bold mb-2" for="search">
            Search
        </label>
        <input type="text" id="search" class="border-gray-300 rounded-md shadow-sm"
            wire:model.debounce.500ms="search"
        >
        <div wire:loading>
            Processing...
        </div>
    </div>
    <div>
        <a href="{{ route('blog.create') }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Create new blog</a>
    </div>
    <div>
        <a href="{{ route('list_blogs', ['main_slug' => $settings->blogs_slug]) }}" target="_blank" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Blog public link</a>
    </div>
    <div>
        <label class="block text-gray-700 font-bold mb-2" for="per_page_selected">
            Results per page
        </label>
        <select id="per_page_selected" wire:model="per_page_selected" class="border-gray-300 rounded-md shadow-sm">
            @foreach ($per_page as $per)
            <option value="{{ $per }}">{{ $per }}</option>
            @endforeach
        </select>
    </div>
    <table class="mx-auto table-auto">
        <thead>
            <tr>
                <td colspan="8">
                    <span>{{ $blogs->links() }}</span>
                </td>
            </tr>
            <tr class="bg-gradient-to-r from-sky-600 to-cyan-400">
                <th class="px-10 py-2 cursor-pointer" wire:click="order_by('id')">
                    <span class="text-gray-100 font-semibold">Id</span>
                </th>
                <th class="px-10 py-2 cursor-pointer" wire:click="order_by('title')">
                    <span class="text-gray-100 font-semibold">Title</span>
                </th>
                <th class="px-10 py-2">
                    <span class="text-gray-100 font-semibold">Published</span>
                </th>
                <th class="px-10 py-2">
                    <span class="text-gray-100 font-semibold">Use global keywords and description</span>
                </th>
                <th class="px-10 py-2 cursor-pointer" wire:click="order_by('keywords')">
                    <span class="text-gray-100 font-semibold">Keywords</span>
                </th>
                <th class="px-10 py-2 cursor-pointer" wire:click="order_by('description')">
                    <span class="text-gray-100 font-semibold">Description</span>
                </th>
                <th class="px-10 py-2">
                    <span class="text-gray-100 font-semibold">View</span>
                </th>
                <th class="px-10 py-2">
                    <span class="text-gray-100 font-semibold">Edit</span>
                </th>
                <th class="px-10 py-2">
                    <span class="text-gray-100 font-semibold">Delete</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-gray-200">
            @foreach ($blogs as $blog)
            <tr class="bg-white border-b-2 border-gray-200">
                <td class="px-10 py-2">
                    <span>{{ $blog->id }}</span>
                </td>
                <td class="px-10 py-2">
                    <span>{{ Str::words($blog->title, 5, '... ') }}</span>
                </td>
                <td class="px-10 py-2">
                    <label class="relative inline-flex items-center mb-5 cursor-pointer">
                        <input type="checkbox" {{ $blog->published ? 'checked' : '' }} class="sr-only peer" wire:click="set_published({{ $blog->id }})">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                    </label>
                </td>
                <td class="px-10 py-2">
                    <label class="relative inline-flex items-center mb-5 cursor-pointer">
                        <input type="checkbox" {{ $blog->use_global ? 'checked' : '' }} class="sr-only peer" wire:click="set_use_global({{ $blog->id }})">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                    </label>
                </td>
                <td class="px-10 py-2">
                    <span>{{ Str::words($blog->keywords, 5,'... ') }}</span>
                </td>
                <td class="px-10 py-2">
                    <span>{{ Str::words($blog->description, 5, '... ') }}</span>
                </td>
                <td class="px-10 py-2">
                    <span><a href="{{ route('blog.show', $blog) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a></span>
                </td>
                <td class="px-10 py-2">
                    <span><a href="{{ route('blog.edit', $blog) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Edit</a></span>
                </td>
                <td class="px-10 py-2">
                    <span><a href="#" wire:click.prevent="delete_blog({{ $blog }})" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Delete</a></span>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8">
                    <span>{{ $blogs->links() }}</span>
                </td>
            </tr>
        </tfoot>
    </table>
</div>