<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Roles') }}
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
              Rol
            </th>
            <th scope="col" class="px-6 py-3">
              Permisos
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $rol)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$rol->id}}
              </th>
              <td class="px-6 py-4">
                {{$rol->name}}
              </td>
              @foreach ($rol->permissions as $permiso)
                <td class="px-6 py-4">
                  {{$permiso->name}}
                </td>
              @endforeach
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</x-app-layout>