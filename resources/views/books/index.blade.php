<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap md:flex-wrap justify-center">
            <div class="content-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Auto Publicar') }}
                </h2>
            </div>
            <div class="w-64 ">

            </div>
            <div class="p-4">
                <a class="bg-sky-700 px-4 py-2 text-white hover:bg-sky-800 sm:px-8 sm:py-3 rounded-lg mx-8"
                    href="{{ route('books.create') }}"> Enviar nuevo Libro</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">#</th>
                                            <th scope="col" class="px-6 py-4">Name</th>
                                            <th scope="col" class="px-6 py-4">Autor</th>
                                            <th scope="col" class="px-6 py-4">Categorie</th>
                                            <th scope="col" class="px-6 py-4">status</th>
                                            <th scope="col" class="px-6 py-4">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($metadata as $key => $book)
                                            <tr
                                                class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                @php
                                                    //dd($book['book_id']);
                                                @endphp
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ ++$i }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $book['book_name'] }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $book['autor'] }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $book['categoria'] }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    @if ($book['status'] == 'Revision')
                                                        <x-badge-dinamic
                                                            class="yellow">{{ $book['status'] }}</x-badge-dinamic>
                                                    @elseif ($book['status'] == 'Eliminado')
                                                        <x-badge-dinamic
                                                            class="red">{{ $book['status'] }}</x-badge-dinamic>
                                                    @elseif ($book['status'] == 'Rechazado')
                                                        <x-badge-dinamic
                                                            class="dark">{{ $book['status'] }}</x-badge-dinamic>
                                                    @else
                                                        <x-badge-dinamic>{{ $book['status'] }}</x-badge-dinamic>
                                                    @endif
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <x-secondary-button>
                                                        <a href="{{ route('books.show', $book['book_slug']) }}">
                                                            Show
                                                        </a>
                                                    </x-secondary-button>
                                                    @role(['super-admin', 'admin'])
                                                        <x-secondary-button>
                                                            <a href="{{ route('books.edit', $book['book_slug']) }}">
                                                                Edit
                                                            </a>
                                                        </x-secondary-button>
                                                    @endrole
                                                    @role(['autor'])
                                                        @if ($book['status'] == 'Revision')
                                                            <x-secondary-button>
                                                                <a href="{{ route('books.edit', $book['book_slug']) }}">
                                                                    Edit
                                                                </a>
                                                            </x-secondary-button>
                                                        @endif
                                                    @endrole
                                                    @role(['super-admin'])
                                                        <x-danger-button x-data=""
                                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion{{ $book['book_id'] }}')">{{ __('Delete') }}</x-danger-button>
                                                    @endrole


                                                    <x-modal name="confirm-user-deletion{{ $book['book_id'] }}"
                                                        :show="$errors->userDeletion->isNotEmpty()" focusable>
                                                        <form method="post"
                                                            action="{{ route('books.destroy', $book['book_slug']) }}"
                                                            class="p-6">
                                                            @csrf
                                                            @method('delete')

                                                            <h2
                                                                class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                                {{ __('Are you sure you want to delete this Book?') }}
                                                            </h2>

                                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                                {{ $book['book_name'] }}
                                                            </p>

                                                            <div class="mt-6 flex justify-end">
                                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                                    {{ __('Cancel') }}
                                                                </x-secondary-button>

                                                                <x-danger-button class="ml-3">
                                                                    {{ __('Delete Book') }}
                                                                </x-danger-button>
                                                            </div>
                                                        </form>
                                                    </x-modal>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {!! $books->render() !!}
            </div>
        </div>
    </div>
</x-app-layout>
