<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Blog') }}
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
                        <input type="text" id="id" disabled class="border-gray-300 rounded-md shadow-sm" value="{{ $blog->id }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="title">
                            Title
                        </label>
                        <input type="text" id="title" disabled class="border-gray-300 rounded-md shadow-sm" value="{{ $blog->title }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="slug">
                            Slug
                        </label>
                        <input type="text" id="slug" disabled class="border-gray-300 rounded-md shadow-sm" value="{{ $blog->slug }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="author">
                            Author
                        </label>
                        <input type="text" id="author" disabled class="border-gray-300 rounded-md shadow-sm" value="{{ $blog->author }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="keywords">
                            Keywords
                        </label>
                        <input type="text" id="keywords" disabled class="border-gray-300 rounded-md shadow-sm" value="{{ $blog->keywords }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="description">
                            Description
                        </label>
                        <input type="text" id="description" disabled class="border-gray-300 rounded-md shadow-sm" value="{{ $blog->description }}">
                    </div>
                    <div class="mb-4">
                        {!! $blog->body !!}
                    </div>
                    @if ($blog->image != null)
                    <div class="mb-4 content-center">
                        <label class="block text-gray-700 font-bold mb-2" for="image">
                            Image
                        </label>
                        <img id="image" src="{{ $blog->image }}" alt="{{ $blog->title }}" class="mx-auto">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>