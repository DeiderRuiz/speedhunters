<x-app-layout>
    <x-slot name="titulo">
      Solicitud De Test Drive
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Confirmación de Posventa') }}
        </h2>
      </x-slot>
    @if(session('success'))
        <div class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
            {{ session('success') }}
        </div>
    @endif
    <div class="w-1/2 mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-400">
            <p class=" dark:text-gray-200"><span class="font-bold dark:text-white">Cliente: </span>{{ $posventa->user->name }} {{ $posventa->user->last_name }}</p>
            <p class=" dark:text-gray-200"><span class="font-bold dark:text-white">CC del cliente:</span>{{ $posventa->user->cc }}</p>
            <p class=" dark:text-gray-200"><span class="font-bold dark:text-white">Telefono: </span>{{ $posventa->user->cellphone }}</p>
            <p class=" dark:text-gray-200"><span class="font-bold dark:text-white">Correo Electrónico: </span>{{ $posventa->user->email }}</p>
            <p class=" dark:text-gray-200"><span class="font-bold dark:text-white">Fecha de solicitud de servico: </span>{{ $posventa->fecha }}</p>
            <form action="{{ route('posventa.update', $posventa->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="relative mb-4">
                    <label for="estado" class="block font-medium text-sm text-gray-700 dark:text-white">Estado</label>
                    <select name="estado" id="estado" class="border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full">
                        <option value="">Seleccionar</option>
                        <option value="solicitado" {{ $posventa->estado == 'solicitado' ? 'selected' : '' }}>Solicitado</option>
                        <option value="aprobado" {{ $posventa->estado == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
                        <option value="rechazado" {{ $posventa->estado == 'aechazado' ? 'selected' : '' }}>Rechazado</option>
                    </select>
                    @error('estado')
                        <small class="font-bold text-red-500/80">{{ $message }}</small>
                    @enderror
                </div>
                <a class="inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 mr-2 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 dark:active:bg-gray-700 dark:focus:ring-gray-500" href="{{ route('posventa.index') }}">Regresar</a>
                <button class="inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 ml-2 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 dark:active:bg-gray-700 dark:focus:ring-gray-500" type="submit">Enviar</button>
            </form>
        </div>
    </div>
  </x-app-layout>