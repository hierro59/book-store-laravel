<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap md:flex-wrap justify-center">
            <div class="content-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Edit Manuscript') }}
                </h2>
            </div>
            <div class="w-64 ">

            </div>
            <div class="p-4">
                <a class="bg-sky-700 px-4 py-2 text-white hover:bg-sky-800 sm:px-8 sm:py-3 rounded-lg mx-8"
                    href="{{ route('manuscripts.index') }}"> Back</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <form method="POST" action="{{ route('manuscripts.store') }}" class="p-6">
                    @csrf

                    <div class="my-4">
                        <label for="name"
                            class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Título *</label>
                        <x-text-input id="name" name="name" type="text" value="{{ $book['book_name'] }}"
                            class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <hr>
                    @role(['super-admin', 'admin'])
                        <div class="my-4">
                            <label for="autor" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Autor
                                *</label>
                            <x-text-input id="autor" name="autor" value="{{ $book['autor'] }}" type="text"
                                class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('autor')" />
                        </div>
                    @endrole
                    @role(['autor'])
                        <input id="autor" name="autor" value="{{ $book['autor'] }}" type="text" hidden />
                    @endrole
                    <div class="my-4">
                        <x-input-label for="coautores" :value="__('Coautores')" />
                        <small>Separados por comas.</small>
                        <x-text-input id="coautores" name="coautor"
                            value="{{ $book['coautores'] == null ? null : $book['coautores'] }}" type="text"
                            class="mt-1 block w-full" />
                        <x-input-error class="mt-2" :messages="$errors->get('coautor')" />
                    </div>
                    <hr>

                    <div class="my-4">
                        <label for="detail" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Breve
                            reseña *</label>
                        <small>Mínimo 120 carácteres. Máximo 300 carácteres.</small>
                        <textarea id="detail" name="detail" minlength="120" maxlength="300"
                            class="block p-2.5 w-full text-xl text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>{{ $book['detalle'] }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('detail')" />
                    </div>
                    <hr>


                    <div class="my-4">
                        <label for="categorie"
                            class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Seleccione una
                            categoría</label>
                        <select id="categorie" name="categorie"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="{{ $book['categoria'] }}">{{ $book['categoria_name'] }}</option>
                            <option disabled>-------------------------</option>
                            @foreach ($categorias as $v)
                                <option value="{{ $v->id }}">{{ $v->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @role(['autor'])
                        <div class="my-4">
                            <input type="checkbox" id="tyc" name="tyc" required>
                            <label for="tyc" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">
                                Confirmo que los nuevos datos ingresados son correctos.
                            </label>
                        </div>
                    @endrole

                    <input type="text" name="book_id" value="{{ $book['book_id'] }}" hidden>
                    <input type="text" name="action" value="update_manuscript" hidden>

                    <div class="mt-6 flex justify-end">
                        <x-danger-button>
                            <a href="{{ route('manuscripts.index') }}">Cancel</a>
                        </x-danger-button>
                        <x-primary-button type="submit" class="ml-3">
                            {{ __('Guardar cambios') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
