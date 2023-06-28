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
                    

<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    <div>
        <a href="{{ route('users.index') }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Admin Users</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Modulo de administracion de usuarios.</p>
        </a>
    </div>
    <div>
        <a href="{{ route('roles.index') }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Admin Roles</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Modulo de administracion de Roles.</p>
        </a>
    </div>
    <div>
        <a href="{{ route('profile.edit') }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Admin Profile</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Gestiona los datos de tu cuenta.</p>
        </a>
    </div>
    <div>
        <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">My Books</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Lista de libros adquiridos.</p>
        </a>
    </div>
    <div>
        <a href="{{ route('books.index') }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Admin Books</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Modulo para administrar Libros.</p>
        </a>
    </div>
</div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
