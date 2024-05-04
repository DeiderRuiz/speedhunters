<!-- Vista del Invitado -->
@guest
<x-guest-layout>
  <x-slot name="titulo">
    Autos
  </x-slot>
    <div class="flex flex-wrap p-8 justify-center">
      @foreach ($autos as $auto)
      <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-2">
        <div class="block w-72 bg-white border border-gray-200 rounded-lg shadow m-2 dark:bg-gray-800 dark:border-gray-400">
          <img
            alt="{{$auto->marca}} {{$auto->modelo}}"
            src="{{$auto->imagen}}"
            class="h-2/4 rounded-md object-cover"
          />
          <div class="p-5">
            <dl>
              <div>
                <dt class="sr-only">Price</dt>
        
                <dd class="text-sm text-gray-700 dark:text-gray-100">${{$auto->precio}}</dd>
              </div>
              <div>
                <dd class="text-xl font-bold tracking-tight  dark:text-white">{{$auto->marca}} {{$auto->modelo}}</dd>
              </div>
            </dl>
            <div class="mt-4">
              <a href="{{$auto->ficha_tecnica}}" class="w-full inline-flex justify-center items-center px-4 py-2 bg-carmesi border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-carmesi focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 darK:active:bg-gray-700 focus:ring-gray-500">
                Ver Ficha tecnica
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</x-guest-layout>
@endguest
<!-- Vista de usuario logeado -->
@role('Administrador|Empleado')
<x-app-layout>
  <x-slot name="titulo">
    Autos
  </x-slot>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
        {{ __('Autos') }}
    </h2>
  </x-slot>
  <div class="py-3">
    <div class="m-5">
      <a href="{{route('autos.create')}}" class="inline-flex justify-center items-center px-4 py-2 bg-carmesi border border-gray-100 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-carmesi focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-800 dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:active:bg-gray-600 focus:ring-gray-800">
        Crear Nuevo Auto
      </a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-200 rounded-lg m-5">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
          <tr>
            <th scope="col" class="px-6 py-3">
              ID
            </th>
            <th scope="col" class="px-6 py-3">
              Marca
            </th>
            <th scope="col" class="px-6 py-3">
              Modelo
            </th>
            <th scope="col" class="px-6 py-3">
              Acciones
            </th>
          </tr>
        </thead>
        <tbody>
          <!-- Todos los autos en una tabla paginada -->
          @foreach ($autos as $auto)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$auto->id}}
              </th>
              <td class="px-6 py-4 dark:text-gray-100">
                {{$auto->marca}}
              </td>
              <td class="px-6 py-4 dark:text-gray-100">
                {{$auto->modelo}}
              </td>
              <td class="px-6 py-4">
                <a href="{{route('autos.edit',$auto->id)}}" class="font-medium text-carmesi dark:text-red-500 hover:underline  dark:text-white">Editar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 p-2">
        {{ $autos->links() }}
      </div>
    </div>
  </div>
</x-app-layout>
@endrole