<x-app-layout>
    <x-slot name="titulo">
      Solicitud De Test Drive
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Responder PQRS') }}
        </h2>
      </x-slot>
    @if(session('success'))
        <div class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
            {{ session('success') }}
        </div>
    @endif
    <div class="w-1/2 mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-400">
          <form action="{{ route('pqrs.update', $pqrs->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <p class="dark:text-gray-200"><span class="font-bold dark:text-white">Tipo:</span> {{$pqrs->tipo}}</p>
              <p class="font-bold dark:text-white">Mensaje:</p>
              <p class=" dark:text-gray-200">{{$pqrs->descripcion}}</p>
              <p class="dark:text-gray-200"><span class="font-bold dark:text-white">Autor: </span>{{$pqrs->cliente->name}} {{$pqrs->cliente->last_name}}</p>
              <a href="mailto:{{$pqrs->cliente->email}}" class="inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 dark:active:bg-gray-700 dark:focus:ring-gray-500">Responder al correo</a>
              <div class="relative mb-4">
                  <label for="estado" class="block font-medium text-sm text-gray-700 dark:text-white">Estado</label>
                  <select name="estado" id="estado" class="border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full">
                      <option value="">Seleccionar</option>
                      <option value="solicitado" {{ $pqrs->estado == 'solicitado' ? 'selected' : '' }}>Sin Responder</option>
                      <option value="respondido" {{ $pqrs->estado == 'respondido' ? 'selected' : '' }}>Respondido</option>
                  </select>
                  @error('estado')
                      <small class="font-bold text-red-500/80">{{ $message }}</small>
                  @enderror
              </div>
              <a class="inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 mr-2 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 dark:active:bg-gray-700 dark:focus:ring-gray-500" href="{{ route('pqrs.index') }}">Regresar</a>
              <button class="inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 ml-2 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 dark:active:bg-gray-700 dark:focus:ring-gray-500" type="submit">Enviar</button>
          </form>
        </div>
    </div>
</x-app-layout>