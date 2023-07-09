<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap md:flex-wrap justify-center"> 
            <div class="content-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Cargar manuscrito') }}
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
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-4">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <h1 class="text-xl font-semibold">Concideraciones generales:</h1>
            <ul class="p-2">
                <li>
                    1. Al enviar tu manuscrito estas de acuerdo con nuestras <a href="{{ route('privacy-policies') }}" target="_BLANK">Políticas de Privacidad.</a>
                </li>
                <li>
                    2. Debes tener en cuanta que nuestro Consejo Editor recibirá tu propuesta y tomará un tiempo estudiarla; 
                    sin embargo te mantendremos informado en todo momento sobre el proceso y formarás parte en las tomas de desición.
                </li>
                <li>
                    3. Si tu propuesta resulta aceptada, pasaremos a un proceso de negociación 
                    donde te presentaremos una propuesta comercial y un contrato que debemos discutir y firmar.
                </li>
                <li>
                    4. Posteriomente a la firma del contrato, entraremos en el proceso de edición que podría tomar
                    entre 2 semanas y 3 meses, dependiendo de la disponibilidad del equipo editor y el feedback que tengamos de tu parte.
                </li>
            </ul>
            <h2 class="text-xl">Para más información puedes visitar los siguientes enlaces:</h2>
            <ol class="p-4">
                <li>
                    <a href="{{ route('faq') }}" target="_BLANK" class="text-blue-500">Proceso de edición</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <form method="POST" action="{{ route('books.store') }}" class="p-6" enctype="multipart/form-data">
                @csrf
                
                <div class="my-4">
                    <label for="name" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Título sugerido *</label>
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <hr>
                <div class="my-4">
                    <label for="autor" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Autor *</label>
                    <input type="text" name="viewautor" value="{{ Auth::user()->name }}" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" disabled>
                    <input type="text" name="autor" value="{{ Auth::user()->name }}" hidden>
                </div>
                <div class="my-4">
                    <x-input-label for="coautores" :value="__('Coautores')" />
                    <small>Separados por comas.</small>
                    <x-text-input id="coautores" name="coautor" type="text" class="mt-1 block w-full" />
                    <x-input-error class="mt-2" :messages="$errors->get('coautor')" />
                </div>
                
                <hr>
                <div class="my-4">
                    <label for="detail" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Breve reseña *</label>
                    <small>Mínimo 120 carácteres. Máximo 300 carácteres.</small>
                    <textarea 
                        id="detail"
                        name="detail" 
                        minlength="120"
                        maxlength="300"
                        class="block p-2.5 w-full text-xl text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                        required
                    ></textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('detail')" />
                </div>
               
                <hr>
                <div class="my-4">
                    <label for="idioma" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Idioma principal *</label>
                  
                    <x-text-input id="idioma" name="language" type="text" class="mt-1 block w-full" />
                    <x-input-error class="mt-2" :messages="$errors->get('idioma')" />
                </div>
                <hr>
                <div class="my-4">
                    <label
                      for="formFile"
                      class="block mb-2 text-xl font-medium text-gray-900 dark:text-white"
                      >Carge el manuscrito</label
                    >
                    <small>Debe ser un archivo en alguno de estos formatos: .odt, .doc o .docx</small>
                    <input
                      class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                      {{-- accept=".odt,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" --}}
                      accept=".odt,.doc,.docx"
                      type="file"
                      id="formFile" 
                      name="bookFile" required/>
                  </div>
                  <hr>
                  <div class="my-4">
                    <label for="categorie" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Seleccione una categoría sugerida</label>
                    <select id="categorie" name="categorie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($categoria as $v)
                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                        @endforeach
                        <option value="99">Otra</option>
                    </select>
                  </div>
                  <div class="my-4">
                    <input type="checkbox" id="tyc" name="tyc" required> <label for="tyc" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Acepto los terminos y condiciones.</label>
                  </div>

                <input type="text" name="created_by" value="{{ Auth::user()->id }}" hidden>

                <input type="text" name="action" value="manuscrito" hidden>

                <div class="mt-6 flex justify-end">
                    <x-danger-button>
                        <a href="{{ route('books.index') }}">Cancel</a>
                    </x-danger-button>
                    <x-primary-button type="submit" class="ml-3">
                        {{ __('Enviar Manuscrito') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
    
</x-app-layout>
