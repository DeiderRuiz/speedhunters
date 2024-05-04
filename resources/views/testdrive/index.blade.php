@role('Administrador|Empleado')
<x-app-layout>
  <x-slot name="titulo">
    Test Drive
  </x-slot>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
        {{ __('Test Drive') }}
    </h2>
  </x-slot>
  @if(session('success'))
      <div class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
          {{ session('success') }}
      </div>
  @endif
  <div class="py-3">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-200 rounded-lg m-5">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-100">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
          <tr>
            <th scope="col" class="px-6 py-3">
              ID
            </th>
            <th scope="col" class="px-6 py-3">
              Cliente
            </th>
            <th scope="col" class="px-6 py-3">
              Telefono
            </th>
            <th scope="col" class="px-6 py-3">
              Correo Electrónico
            </th>
            <th scope="col" class="px-6 py-3">
              Auto
            </th>
            <th scope="col" class="px-6 py-3">
              Fecha de solicitud
            </th>
            <th scope="col" class="px-6 py-3">
              Estado
            </th>
            <th scope="col" class="px-6 py-3">
              Acciones
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($testdrives as $testdrive)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$testdrive->id}}
              </th>
              <td class="px-6 py-4">
                {{$testdrive->user->name}} {{$testdrive->user->last_name}}
              </td>
              <td class="px-6 py-4">
                {{$testdrive->user->cellphone}}
              </td>
              <td class="px-6 py-4">
                {{$testdrive->user->email}}
              </td>
              <td class="px-6 py-4">
                {{$testdrive->auto->marca}} {{$testdrive->auto->modelo}}
              </td>
              <td class="px-6 py-4">
                {{$testdrive->fecha}}
              </td>
              <td class="px-6 py-4">
                {{ucfirst($testdrive->estado)}}
              </td>
              <td class="px-6 py-4">
                <a href="{{route('testdrive.edit',$testdrive->id)}}" class="font-medium text-red-600 dark:text-red-500 hover:underline dark:text-white">Cambiar estado</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 p-2">
        {{ $testdrives->links() }}
      </div>
    </div>
  </div>
</x-app-layout>
@endrole