<x-layout>
    <a href="{{ route('admin.dashboard') }}" class="block mb-12 text-xl font-bold text-blue-700 animate-pulse">&larr; Go back to your dashboard</a>
    <h1 class="title">Manage Users</h1>
    <a href="{{ route('admin.users.create') }}"
        class="inline-block mb-4 bg-pink-600 text-white font-bold px-4 py-2 rounded hover:bg-slate-700">
        + Add New User
    </a>
    @if (session('success'))
        <x-flashMsg msg="{{ session('success') }}" />
    @endif

    <div class="card overflow-x-auto">
        <table class="min-w-full text-base font-bold">
            <thead>
                <tr class="bg-slate-100 text-xl text-pink-800 text-left">
                <th class="p-2">Firstname</th>
                <th class="p-2">Lastname</th>
                <th class="p-2">Email</th>
                <th class="p-2">Role</th>
                <th class="p-2">Avatar</th>
                <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border-t">
                    <td class="p-2">{{ $user->first_name }}</td>
                    <td class="p-2">{{ $user->last_name }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">{{ $user->role }}</td>
                    <td class="p-2">
                        @if ($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar)
                            }}" alt="avatar" class="h-10 w-10
                            rounded-full">
                        @endif
                    </td>
                    <td class="p-2 flex gap-8">
                        <a href="{{ route('admin.users.edit', $user) }}"
                        class="text-blue-800 font-bold hover:underline">Edit</a>
                        <form method="POST" action="{{
                        route('admin.users.destroy', $user) }}"
                        onsubmit="return confirm('Delete this user?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 font-bold
                        hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $users->links() }}</div>
</x-layout>