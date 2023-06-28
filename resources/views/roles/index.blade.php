<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap md:flex-wrap justify-center"> 
            <div class="content-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Role Management') }}
                </h2>
            </div>
            <div class="w-64 ">

            </div>
            <div class="p-4">
                <a class="bg-sky-700 px-4 py-2 text-white hover:bg-sky-800 sm:px-8 sm:py-3 rounded-lg mx-8" href="{{ route('roles.create') }}"> Create New Rol</a>
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
                            <th scope="col" class="px-6 py-4">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                          <tr
                            class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ ++$i }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $role->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <x-secondary-button>
                                    <a href="{{ route('roles.show',$role->id) }}">
                                        Show
                                    </a>
                                </x-secondary-button>
                                <x-secondary-button>
                                    <a href="{{ route('roles.edit',$role->id) }}">
                                        Edit
                                    </a>
                                </x-secondary-button>
                                <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion{{$role->id}}')"
                                >{{ __('Delete') }}</x-danger-button>
                                <x-modal name="confirm-user-deletion{{$role->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                    <form method="post" action="{{ route('roles.destroy', $role->id) }}" class="p-6">
                                        @csrf
                                        @method('delete')
                            
                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('Are you sure you want to delete this account?') }} 
                                        </h2>
                            
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                            {{$role->name}}
                                        </p>
                            
                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancel') }}
                                            </x-secondary-button>
                            
                                            <x-danger-button class="ml-3">
                                                {{ __('Delete Account') }}
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
              {!! $roles->render() !!}
        </div>
    </div>
</div>
</x-app-layout>