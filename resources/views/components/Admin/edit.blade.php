<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Asignar Roles') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-400">
                <h1 class="text-xl dark:text-white">Asignar nuevo rol a: {{$user->name}} {{$user->last_name}}</h1>
                <form action="{{route('users.update', $user)}}"  method="POST">
                    @csrf
                    @method('PATCH')
                    @foreach ($roles as $role)
                        <div class="relative block mt-4">
                            <input type="checkbox" name="roles[]" id="role{{ $role->id }}" value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'checked' : '' }} class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-300 dark:border-gray-100"/>
                            <label class="dark:text-white" for="role{{ $role->id }}">{{ $role->name }}</label>
                        </div> 
                    @endforeach
                    <div class="flex items-center justify-between">
                    <button type="submit" class="mt-4 inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 mr-2 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 dark:active:bg-gray-700 dark:focus:ring-gray-500">
                        Guardar
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        
    </div>
</x-app-layout>