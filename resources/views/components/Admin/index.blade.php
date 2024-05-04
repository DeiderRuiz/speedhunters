<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-200 rounded-lg m-5">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-100">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
          <tr>
            <th scope="col" class="px-6 py-3">
              ID
            </th>
            <th scope="col" class="px-6 py-3">
              Usuario
            </th>
            <th scope="col" class="px-6 py-3">
              Rol actual
            </th>
            <th scope="col" class="px-6 py-3">
              Acciones
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$user->id}}
              </th>
              <td class="px-6 py-4">
                {{$user->name}} {{$user->last_name}}
              </td>
              @foreach ($user->roles as $rol)
                <td class="px-6 py-4">
                  {{$rol->name}}
                </td>
              @endforeach
              <td class="px-6 py-4">
                <a href="{{route('users.edit',$user->id)}}" class="font-medium text-red-600 dark:text-red-500 hover:underline dark:text-white">Cambiar Rol</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{-- <div class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 p-2">
        {{ $users->links() }}
      </div> --}}
    </div>
</x-app-layout>