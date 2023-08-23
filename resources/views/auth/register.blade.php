<x-guest-layout>
    <ul
        class="mb-4 text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
        <li class="w-full">
            <a href="{{ route('login') }}"
                class="inline-block w-full p-4 bg-white rounded-r-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">
                Iniciar sesión
            </a>
        </li>
        <li class="w-full">
            <a href="#"
                class="inline-block w-full p-4 text-gray-900 font-extrabold bg-gray-100 rounded-l-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none dark:bg-gray-700 dark:text-white"
                aria-current="page">
                Registrase
            </a>
        </li>
    </ul>
    <form method="POST" action="{{ route('register') }}" id="form">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="role" :value="__('¿Que eres?')" />
            <ul class="grid w-full gap-6 md:grid-cols-2">
                <li>
                    <input type="radio" id="hosting-small" name="roles" value="customer" class="hidden peer"
                        required>
                    <label for="hosting-small"
                        class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512">
                            <path fill="dark:text-white" d="M160 96a96 96 0 1 1 192 0A96 96 0 1 1 160 96zm80 152V512l-48.4-24.2c-20.9-10.4-43.5-17-66.8-19.3l-96-9.6C12.5 457.2 0 443.5 0 427V224c0-17.7 14.3-32 32-32H62.3c63.6 0 125.6 19.6 177.7 56zm32 264V248c52.1-36.4 114.1-56 177.7-56H480c17.7 0 32 14.3 32 32V427c0 16.4-12.5 30.2-28.8 31.8l-96 9.6c-23.2 2.3-45.9 8.9-66.8 19.3L272 512z"/>
                        </svg> --}}
                        <div class="block">
                            <div class="w-full text-lg font-semibold">Lector</div>
                            <div class="w-full">Quiero leer obras únicas</div>
                        </div>
                    </label>
                </li>
                <li>
                    <input type="radio" id="hosting-big" name="roles" value="autor" class="hidden peer">
                    <label for="hosting-big"
                        class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">Autor</div>
                            <div class="w-full">Deseo publicar mis obras</div>
                        </div>
                    </label>
                </li>
            </ul>
        </div>
        <div class="mt-4 mb-4">
            <div class="captcha">
                <span class="mx-auto">{!! captcha_img() !!}</span>
            </div>
        </div>
        <div class="mb-4">
            <input id="captcha" type="text" class="block mt-1 w-full" placeholder="Escriba lo que ve"
                name="captcha">
        </div>
        @error('captcha')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">Captcha inválido</div>
        @enderror

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Ya estoy registrado') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Registrar') }}
            </x-primary-button>

        </div>
    </form>
</x-guest-layout>
