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
                        @role(['super-admin'])
                            <div>
                                <a href="{{ route('users.index') }}"
                                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Admin
                                        Users</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">Modulo de administracion de
                                        usuarios.</p>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('roles.index') }}"
                                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Admin
                                        Roles</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">Modulo de administracion de
                                        Roles.</p>
                                </a>
                            </div>
                        @endrole

                        @role(['autor', 'super-admin', 'admin', 'curator'])
                            <div>
                                <a href="{{ route('royalties') }}"
                                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Regalías</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">Estado cuenta sobre sus
                                        regalías.</p>
                                    <div
                                        class="mt-2 p-4 rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                        <h2 class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            Saldo $ {{ $allRoyalties['total_royalties'] }}
                                        </h2>
                                        <h2 class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            Libros vendidos {{ $allRoyalties['total_sales'] }}
                                        </h2>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('manuscripts.index') }}"
                                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Publicar una obra</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">Ideal si deseas que nosotros
                                        editemos tu obra.</p>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('books.index') }}"
                                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Auto
                                        Publicar</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">Si tu obra ya está editada y
                                        solo quieres publicarla en nuestro catálogo.</p>
                                </a>
                            </div>
                        @endrole

                        <div>
                            <a href="{{ route('profile.edit') }}"
                                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Admin
                                    Profile</h5>
                                <p class="font-normal text-gray-700 dark:text-gray-400">Gestiona los datos de tu cuenta.
                                </p>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('my-library') }}"
                                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">My
                                    Books</h5>
                                <p class="font-normal text-gray-700 dark:text-gray-400">Lista de libros adquiridos.</p>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
