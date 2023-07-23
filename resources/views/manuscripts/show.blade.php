<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap md:flex-wrap justify-center"> 
            <div class="content-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Show Manuscript') }}
                </h2>
            </div>
            <div class="w-64 ">

            </div>
            <div class="p-4">
                <a class="bg-sky-700 px-4 py-2 text-white hover:bg-sky-800 sm:px-8 sm:py-3 rounded-lg mx-8" href="{{ route('manuscripts.index') }}"> Back</a>
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
                        <form method="POST" action="{{ route('manuscripts.store') }}">
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
                        <a href="{{ route('download', $book['book_id']) }}" target="_BLANK">Descargar Manuscripto</a>
                    </x-primary-button>
                    
                </div>
                <div class="col-span-2 p-4 rounded-e-lg">
                    <ol class="border-l-2 border-primary dark:border-primary-500">
                     
                      @foreach ($progress as $key => $p)
                        <li>
                          <div class="flex-start flex items-center">
                            <div
                              class="-ml-[9px] -mt-2 mr-3 flex h-4 w-4 items-center justify-center rounded-full bg-primary dark:bg-primary-500"></div>
                            <h4 class="-mt-2 text-xl font-semibold">
                              {{ $p->title }}
                            </h4>
                          </div>
                          <div class="mb-6 ml-6 pb-6">
                          <small class="text-sm text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
                              {{ $p->created_at }}
                          </small>
                            <p class="mb-4 mt-2 text-neutral-600 dark:text-neutral-300">
                              {{ $p->description }}
                            </p>
                            
                          </div>
                        </li>
                      @endforeach
                      </ol>
                </div>
            </div>
                <div class="mt-6 flex justify-end">
                    <x-primary-button>
                        <a href="{{ route('manuscripts.index') }}">Back</a>
                    </x-primary-button>
                </div>
        </div>
        
    </div>
</div>
    
</x-app-layout>