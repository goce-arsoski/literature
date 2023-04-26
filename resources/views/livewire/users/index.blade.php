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
        <a href="{{ route('user.create') }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Create new user</a>
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
            <tr class="bg-gradient-to-r from-sky-600 to-cyan-400">
                <th class="px-10 py-2 cursor-pointer" wire:click="order_by('id')">
                    <span class="text-gray-100 font-semibold">Id</span>
                </th>
                <th class="px-10 py-2 cursor-pointer" wire:click="order_by('name')">
                    <span class="text-gray-100 font-semibold">Name</span>
                </th>
                <th class="px-10 py-2 cursor-pointer" wire:click="order_by('email')">
                    <span class="text-gray-100 font-semibold">Email</span>
                </th>
                <th class="px-10 py-2">
                    <span class="text-gray-100 font-semibold">Role</span>
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
            @foreach ($users as $user)
            <tr class="bg-white border-b-2 border-gray-200">
                <td class="px-10 py-2">
                    <span>{{ $user->id }}</span>
                </td>
                <td class="px-10 py-2">
                    <span>{{ $user->name }}</span>
                </td>
                <td class="px-10 py-2">
                    <span>{{ $user->email }}</span>
                </td>
                <td class="px-10 py-2">
                    <span>{{ ucfirst($user->getRoleNames()->implode(', ')) }}</span>
                </td>
                <td class="px-10 py-2">
                    <span><a href="{{ route('user.show', $user) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a></span>
                </td>
                <td class="px-10 py-2">
                    <span><a href="{{ route('user.edit', $user) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Edit</a></span>
                </td>
                <td class="px-10 py-2">
                    <span><a href="#" wire:click.prevent="delete_user({{ $user }})" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Delete</a></span>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7">
                    <span>{{ $users->links() }}</span>
                </td>
            </tr>
        </tfoot>
    </table>
</div>