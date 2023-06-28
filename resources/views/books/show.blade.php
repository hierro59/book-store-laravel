<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap md:flex-wrap justify-center"> 
            <div class="content-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Show Book') }}
                </h2>
            </div>
            <div class="w-64 ">

            </div>
            <div class="p-4">
                <a class="bg-sky-700 px-4 py-2 text-white hover:bg-sky-800 sm:px-8 sm:py-3 rounded-lg mx-8" href="{{ route('books.index') }}"> Back</a>
            </div>
        </div>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="grid grid-rows grid-flow-col gap-4">
                <div class="col-span-6 bg-slate-100 p-4 rounded-s-lg">
                    <div class="my-4">
                        <x-input-label for="name" :value="__('Título')" />
                        {{ $book['book_name'] }}
                    </div>
        
                    <div class="my-4">
                        <x-input-label for="name" :value="__('Autor')" />
                        {{ $book['autor'] }}
                    </div>
        
                    <div class="my-4">
                        <x-input-label for="email" :value="__('Categoría')" />
                        {{ $book['categoria'] }}
                    </div>
        
                    <div class="my-4">
                        <x-input-label for="email" :value="__('Detalle')" />
                        {{ $book['detalle'] }}
                    </div>

                    <div class="my-4">
                        <x-input-label for="email" :value="__('Status')" />
                        @if ($book['status'] == 'Revision')
                            <x-badge-dinamic class="yellow">{{ $book['status'] }}</x-badge-dinamic>
                        @elseif ($book['status'] == 'Eliminado')
                            <x-badge-dinamic class="red">{{ $book['status'] }}</x-badge-dinamic>
                        @elseif ($book['status'] == 'Rechazado')
                            <x-badge-dinamic class="dark">{{ $book['status'] }}</x-badge-dinamic>
                        @else
                            <x-badge-dinamic>{{ $book['status'] }}</x-badge-dinamic>
                        @endif
                    </div>
                @role(['super-admin', 'admin'])
                    <div class="my-4">
                        <form method="POST" action="{{ route('books.store') }}">
                            @csrf
                            
                            <div class="grid grid-rows grid-flow-col gap-4">
                                <div class="col-span-6">
                                    <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="{{ $book['status'] }}" selected>{{ $book['status'] }}</option>
                                        @foreach($book['allstatus'] as $v)
                                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <input type="text" name="book_id" value="{{ $book['book_id'] }}" hidden>
                                    <input type="text" name="action" value="change_status" hidden>
                                    <x-secondary-button type="submit" class="ml-3">
                                        {{ __('Cambiar') }}
                                    </x-secondary-button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endrole
                    <x-divisor-line/>

                    <x-primary-button>
                        <a href="../storage/books/{{ $book['file'] }}" target="_BLANK">Descargar Archivo</a>
                    </x-primary-button>
                    
                </div>
                <div class="col-span-2 bg-slate-400 p-4 rounded-e-lg">
                    <img style="max-height: 500px" src="../thumbnail/covers/{{ $book['image_name'] }}" alt=""> 
                    <span class="text-2xl font-bold">Portada</span>
                </div>
            </div>
                <div class="mt-6 flex justify-end">
                    <x-primary-button>
                        <a href="{{ route('books.index') }}">Back</a>
                    </x-primary-button>
                </div>
        </div>
        
    </div>
</div>
    
</x-app-layout>