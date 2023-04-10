<div>
    <div>
        Search
    </div>
    <div>
        Create new user
    </div>
    <table class="mx-auto table-auto">
        <thead>
            <tr class="bg-gradient-to-r from-sky-600 to-cyan-400">
                <th class="px-16 py-2">
                    <span class="text-gray-100 font-semibold">Id</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-gray-100 font-semibold">Name</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-gray-100 font-semibold">Email</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-gray-100 font-semibold">Roles</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-gray-100 font-semibold">View</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-gray-100 font-semibold">Edit</span>
                </th>
                <th class="px-16 py-2">
                    <span class="text-gray-100 font-semibold">Delete</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-gray-200">
            @foreach ($users as $user)
            <tr class="bg-white border-b-2 border-gray-200">
                <td class="px-16 py-2">
                    <span>{{ $user->id }}</span>
                </td>
                <td class="px-16 py-2">
                    <span>{{ $user->name }}</span>
                </td>
                <td class="px-16 py-2">
                    <span>{{ $user->email }}</span>
                </td>
                <td class="px-16 py-2">
                    <span>{{ $user->getRoleNames()->implode(', ') }}</span>
                </td>
                <td class="px-16 py-2">
                    <span><a href="{{ route('user.show', $user->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a></span>
                </td>
                <td class="px-16 py-2">
                    <span><a href="{{ route('user.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Edit</a></span>
                </td>
                <td class="px-16 py-2">
                    <span>Delete</span>
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