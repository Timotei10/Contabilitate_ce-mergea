<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Utilizatori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Lista utilizatori</h2>
                    <table class="min-w-full border-collapse">
                        <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Nume</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Rol</th>
                            <th class="border px-4 py-2">Acțiuni</th>
                        </tr>
                        </thead>
                        <tbody class="bg-gray-100 dark:bg-gray-700">
                        @foreach($users as $user)
                            <tr class="border-b border-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600">
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">
                                        <span class="px-2 py-1 font-semibold {{ $user->role === 'admin' ? 'bg-green-500 text-white' : 'bg-yellow-500 text-black' }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                </td>
                                <td class="border px-4 py-2 flex space-x-2">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700">Editează</a>
                                    <span class="text-gray-500">|</span> <!-- Bara de separare -->
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Șterge</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
