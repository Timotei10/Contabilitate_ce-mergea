<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(auth()->user()->role === 'admin')
                        <h2 class="text-2xl font-bold">Bine ai venit, Admin!</h2>
                        <p class="mt-2">Ai acces la panoul de administrare.</p>
                        <a href="{{ route('admin.users') }}"
                           class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Gestionare Utilizatori
                        </a>
                    @else
                        <h2 class="text-2xl font-bold">Bine ai venit, utilizator!</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
