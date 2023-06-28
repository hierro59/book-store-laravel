<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap md:flex-wrap justify-center"> 
            <div class="content-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Edit User') }}
                </h2>
            </div>
            <div class="w-64 ">

            </div>
            <div class="p-4">
                <a class="bg-sky-700 px-4 py-2 text-white hover:bg-sky-800 sm:px-8 sm:py-3 rounded-lg mx-8" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <form method="PATCH" action="{{ route('users.update', $user->id) }}" class="p-6">
                @csrf
                
                <div class="my-4">
                    <x-input-label for="name" :value="__('Name')" />
                    {{ $user->name }}
                </div>

                <div class="my-4">
                    <x-input-label for="email" :value="__('Email')" />
                    {{ $user->email }}
                </div>

                <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                {{ $user->getRoleNames()[0] }}
    
                <div class="mt-6 flex justify-end">
                    <x-primary-button>
                        <a href="{{ route('users.index') }}">Back</a>
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
    
</x-app-layout>