<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap md:flex-wrap justify-center"> 
            <div class="content-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Upload New Book') }}
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
            <form method="POST" action="{{ route('books.store') }}" class="p-6" enctype="multipart/form-data">
                @csrf
                
                <div class="my-4">
                    <label for="name" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Título *</label>
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <hr>
                @role(['super-admin', 'admin'])
                <div class="my-4">
                    <label for="autor" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Autor *</label>
                    <x-text-input id="autor" name="autor" type="text" class="mt-1 block w-full" />
                    <x-input-error class="mt-2" :messages="$errors->get('autor')" />
                </div>
                @endrole
                @role(['autor'])
                <div class="my-4">
                    <label for="autor" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Autor *</label>
                    <input type="text" name="viewautor" value="{{ Auth::user()->name }}" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" disabled>
                    <input type="text" name="autor" value="{{ Auth::user()->name }}" hidden>
                </div>
                @endrole
                <div class="my-4">
                    <x-input-label for="coautores" :value="__('Coautores')" />
                    <small>Separados por comas.</small>
                    <x-text-input id="coautores" name="coautor" type="text" class="mt-1 block w-full" />
                    <x-input-error class="mt-2" :messages="$errors->get('coautor')" />
                </div>
                <hr>
                <div class="my-4">
                    <label for="year" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Fecha de publicación *</label>
                    <x-text-input id="year" name="publish_date" type="date" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('publish_date')" />
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
                    <label for="isbn" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">ISBN</label>
                 
                    <x-text-input id="isbn" name="isbn" type="text" class="mt-1 block w-full" />
                    <x-input-error class="mt-2" :messages="$errors->get('isbn')" />
                </div>
                <hr>
                <div class="my-4">
                    <label for="idioma" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Idioma principal *</label>
                  
                    <x-text-input id="idioma" name="language" type="text" class="mt-1 block w-full" />
                    <x-input-error class="mt-2" :messages="$errors->get('idioma')" />
                </div>
                <hr>
                <div class="my-4">
                    <label for="price" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Precio neto sugerido por el autor</label>
                    <small>Valor neto del texto para el autor. No incluye porcentaje de ventas, impuestos, ni descuentos. Deje en 0.00 si el texto es de distribución gratuita.</small>
                    <x-text-input id="price" name="price" type="number" min="0.00" step="0.01" value="0.00" class="mt-1 block w-full" />
                    <x-input-error class="mt-2" :messages="$errors->get('price')" />
                </div>

                @role(['super-admin', 'admin'])
                <div class="my-4">
                    <label for="discount" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Descuento</label>
                    <small>Escriba un numero entero que representa un porcentaje de descuento. Ej. 10 = 10%</small>
                    <x-text-input id="discount" name="discount" type="number" min="0" max="100" value="0" class="mt-1 block w-full" />
                    <x-input-error class="mt-2" :messages="$errors->get('discount')" />
                </div>
                @endrole
                
                <hr>
                <div class="my-4">
                    <label
                      for="formFile"
                      class="block mb-2 text-xl font-medium text-gray-900 dark:text-white"
                      >Carge el manuscrito</label
                    >

                    <input
                      class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                      {{-- accept=".odt,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" --}}
                      accept=".pdf,.epub,"
                      type="file"
                      id="formFile" 
                      name="bookFile" required/>
                  </div>
                  <hr>
                  <div class="my-4">
                    <label
                      for="portadaFile"
                      class="block mb-2 text-xl font-medium text-gray-900 dark:text-white"
                      >Seleccione la portada</label
                    >
                    <small>Si no tiene portada, puede solicitar que la hagamos por usted.</small>
                    <input
                      class="relative mb-2 m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                      accept="image/*"
                      type="file"
                      id="portadaFile" 
                      name="portadaFile"/>
                      <input type="checkbox" id="dp" name="diseno-portada"> <label for="dp" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Solicito diseño de portada</label>
                  </div>
                  <hr>
                  <div class="my-4">
                    <label for="categorie" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Seleccione una categoría</label>
                    <select id="categorie" name="categorie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($categoria as $v)
                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="my-4">
                    <input type="checkbox" id="tyc" name="tyc" required> <label for="tyc" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Acepto los terminos y condiciones.</label>
                  </div>

                <input type="text" name="created_by" value="{{ Auth::user()->id }}" hidden>

                <input type="text" name="type" value="portada" hidden>
                <div class="mt-6 flex justify-end">
                    <x-danger-button>
                        <a href="{{ route('books.index') }}">Cancel</a>
                    </x-danger-button>
                    <x-primary-button type="submit" class="ml-3">
                        {{ __('Subir Libro') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
    
</x-app-layout>
