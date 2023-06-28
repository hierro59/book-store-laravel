<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap md:flex-wrap justify-center"> 
            <div class="content-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Create New Role') }}
                </h2>
            </div>
            <div class="w-64 ">

            </div>
            <div class="p-4">
                <a class="bg-sky-700 px-4 py-2 text-white hover:bg-sky-800 sm:px-8 sm:py-3 rounded-lg mx-8" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <form method="POST" action="{{ route('roles.store') }}" class="p-6">
                @csrf
                
                <div class="my-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Permissions</label>
                @foreach($permission as $v)
                    <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                        <input id="bordered-checkbox-{{ $v->id }}" type="checkbox" value="{{ $v->id }}" name="permission" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-checkbox-{{ $v->id }}" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $v->name }}</label>
                    </div>
                @endforeach
    
                <div class="mt-6 flex justify-end">
                    <x-danger-button>
                        <a href="{{ route('users.index') }}">Cancel</a>
                    </x-danger-button>
                    <x-primary-button type="submit" class="ml-3">
                        {{ __('Create Account') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
    
</x-app-layout>
