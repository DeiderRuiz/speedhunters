<x-guest-layout>
  <x-slot name="titulo">
      Cotizar
  </x-slot>
  @if(session('success'))
    <div class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
      {{ session('success') }}
    </div>
  @endif
  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="overflow-hidden shadow-xl">
        <form class="p-4 bg-white border border-gray-200 sm:rounded-lg grid grid-cols-1 md:grid-cols-2 gap-4 dark:bg-gray-800 dark:border-gray-400" action="{{route('cotizacion.store')}}" method="POST">
          @csrf
          <div class="justify-center items-center p-2">
            <div class="relative">
              <label for="seleccionar" class="block font-medium text-sm text-gray-700 dark:text-white">Seleccionar auto:</label>
              <select name="cod_auto" id="seleccionar" onchange="seleccionarAuto();" class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700">
                <option value="">Seleccionar</option>
                @foreach ($autos as $auto)
                  <option value="{{$auto->id}}">{{$auto->marca}} {{$auto->modelo}}</option>
                @endforeach
              </select>
              @error('cod_auto')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
              @enderror
            </div>
            <div class="mx-auto">
              @foreach ($autos as $auto)
                <div class="w-full sm:w-1/2 h-auto sm:h-full lg:w-1/3 xl:w-1/4 p-2 hidden mx-auto" id="{{$auto->id}}" style="width: 100%;">
                  <div class="block bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-600">
                    <img
                      alt="{{$auto->marca}} {{$auto->modelo}}"
                      src="{{ asset($auto->imagen) }}"
                      class="h-2/4 rounded-md object-cover"
                    />
                    <div class="p-5">
                      <dl>
                        <div>
                          <dt class="sr-only">Precio</dt>                
                          <dd class="text-sm text-gray-700 dark:text-gray-100">${{$auto->precio}}</dd>
                        </div>
                        <div>
                          <dd class="text-xl font-bold tracking-tight dark:text-white">{{$auto->marca}} {{$auto->modelo}}</dd>
                        </div>
                      </dl>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="justify-center items-center p-2">
            <div class="relative mb-4">
              <label for="cc" class="block font-medium text-sm text-gray-700 dark:text-white">Numero De Identidad</label>  
              <input type="text" id="cc" name="cc" placeholder="Numero De Identidad" value="{{old('cc',$cotizacion->cc)}}" class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700"/>
              @error('cc')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
              @enderror
            </div>
            <div class="relative mb-4">
              <label for="name" class="block font-medium text-sm text-gray-700 dark:text-white">Nombre</label>  
              <input type="text" id="name" name="name" placeholder="Nombre" value="{{old('name',$cotizacion->name)}}" class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700"/>
              @error('name')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
              @enderror
            </div>
            <div class="relative mb-4">
              <label for="last_name" class="block font-medium text-sm text-gray-700 dark:text-white">Apellidos</label>  
              <input type="text" id="last_name" name="last_name" placeholder="Apellidos" value="{{old('last_name',$cotizacion->last_name)}}" class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700"/>
              @error('last_name')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
              @enderror
            </div>
            <div class="relative mb-4">
              <label for="cellphone" class="block font-medium text-sm text-gray-700 dark:text-white">Telefono</label>  
              <input type="text" id="cellphone" name="cellphone" placeholder="Telefono" value="{{old('cellphone',$cotizacion->cellphone)}}" class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700"/>
              @error('cellphone')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
              @enderror
            </div>
            <div class="relative mb-4">
              <label for="email" class="block font-medium text-sm text-gray-700 dark:text-white">Email</label>  
              <input type="text" id="email" name="email" placeholder="Email" value="{{old('email',$cotizacion->email)}}" class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700"/>
              @error('email')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
              @enderror
            </div>
            <div class="relative mb-4">
              <label for="fecha" class="block font-medium text-sm text-gray-700 dark:text-white">Fecha Estimada Para La Solicitud De Cotización</label>
              <input type="date" id="fecha" name="fecha" value="{{old('fecha',$cotizacion->fecha)}}" class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700"/>
              @error('fecha')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
              @enderror
            </div>
            <a class="inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 mr-2 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 darK:active:bg-gray-700 focus:ring-gray-500" href="{{ route('index') }}">
              Regresar
            </a>
            <button class="inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 ml-2 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 darK:active:bg-gray-700 focus:ring-gray-500" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="/js/js.js"></script>
</x-guest-layout>