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
        <a href="{{ route('faqs.create') }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Create new FAQ</a>
    </div>
    <div>
        <a href="{{ route('list_faqs') }}" target="_blank" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">FAQs public link</a>
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
                    <span>{{ $faqs->links() }}</span>
                </td>
            </tr>
            <tr class="bg-gradient-to-r from-sky-600 to-cyan-400">
                <th class="px-10 py-2 cursor-pointer" wire:click="order_by('id')">
                    <span class="text-gray-100 font-semibold">Id</span>
                </th>
                <th class="px-10 py-2 cursor-pointer" wire:click="order_by('question')">
                    <span class="text-gray-100 font-semibold">Question</span>
                </th>
                <th class="px-10 py-2 cursor-pointer" wire:click="order_by('answer')">
                    <span class="text-gray-100 font-semibold">Answer</span>
                </th>
                <th class="px-10 py-2">
                    <span class="text-gray-100 font-semibold">Order</span>
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
            @foreach ($faqs as $faq)
            <tr class="bg-white border-b-2 border-gray-200">
                <td class="px-10 py-2">
                    <span>{{ $faq->id }}</span>
                </td>
                <td class="px-10 py-2">
                    <span>{{ Str::words($faq->question, 5, '... ') }}</span>
                </td>
                <td class="px-10 py-2">
                    <span>{{ Str::words($faq->answer, 5, '... ') }}</span>
                </td>
                @if ($loop->first)
                <td class="px-10 py-2">
                    <span>
                        {{ $faq->order }}
                        <svg wire:click.prevent="move_down({{ $faq->id }})" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 512 512" fill="#000000"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                    </span>
                </td>
                @elseif ($loop->last)
                <td class="px-10 py-2">
                    <span>
                        <svg wire:click.prevent="move_up({{ $faq->id }})" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 512 512" fill="#000000"><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>
                        {{ $faq->order }}
                    </span>
                </td>
                @else
                <td class="px-10 py-2">
                    <span>
                        <svg wire:click.prevent="move_up({{ $faq->id }})" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 512 512" fill="#000000"><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>
                        {{ $faq->order }}
                        <svg wire:click.prevent="move_down({{ $faq->id }})" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 512 512" fill="#000000"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                    </span>
                </td>
                @endif
                <td class="px-10 py-2">
                    <span><a href="{{ route('faqs.edit', $faq) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Edit</a></span>
                </td>
                <td class="px-10 py-2">
                    <span><a href="#" wire:click.prevent="delete_faq({{ $faq }})" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Delete</a></span>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8">
                    <span>{{ $faqs->links() }}</span>
                </td>
            </tr>
        </tfoot>
    </table>
</div>