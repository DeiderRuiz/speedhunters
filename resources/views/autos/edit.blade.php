<x-app-layout>
  <x-slot name="titulo">
    Editar Auto
  </x-slot>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
        {{ __('Editar') }} {{$auto->marca}} {{$auto->modelo}}
    </h2>
  </x-slot>
  <div class="w-1/2 mx-auto sm:px-6 lg:px-8 py-6">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-400">
        <form action="{{route('autos.update',$auto->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH'){{-- IMPORTANTE PARA LOS FORMULARIOS DEL METODO EDIT --}}
            <div class="relative mb-4 mx-auto">
                <label for="marca" class="block font-medium text-sm text-gray-700 dark:text-white">Marca</label>  
                <input type="text" id="marca" name="marca" placeholder="Marca" value="{{old('marca',$auto->marca)}}" class="border border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700"/>
                @error('marca')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
            </div>
            <div class="relative mb-4 mx-auto">
                <label for="modelo" class="block font-medium text-sm text-gray-700 dark:text-white">Modelo</label>  
                <input type="text" id="modelo" name="modelo" placeholder="Modelo" value="{{old('modelo',$auto->modelo)}}" class="border border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700"/>
                @error('modelo')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
            </div>
            <div class="relative mb-4 mx-auto">
                <label for="precio" class="block font-medium text-sm text-gray-700 dark:text-white">Precio</label>  
                <input type="text" id="precio" name="precio" placeholder="Precio" value="{{old('precio',$auto->precio)}}" class="border border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700"/>
                @error('precio')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
            </div>
            <div class="relative mb-4 mx-auto">
                <label for="years" class="block font-medium text-sm text-gray-700 dark:text-white">Año</label>  
                <input type="text" id="years" name="years" placeholder="Año" value="{{old('years',$auto->years)}}" class="border border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700"/>
                @error('years')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
            </div>
            <div class="relative mb-4 mx-auto">
                <label for="clase" class="block font-medium text-sm text-gray-700 dark:text-white">Clase</label>  
                <input type="text" id="clase" name="clase" placeholder="Clase" value="{{old('clase',$auto->clase)}}" class="border border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700"/>
                @error('clase')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
            </div>
            <div class="relative mb-4 mx-auto">
                <label for="imagen" class="block font-medium text-sm text-gray-700 dark:text-white">
                    Seleccionar Imagen Del Auto
                </label>
                <input type="file" id="imagen" name="imagen" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 focus:border-red-500 focus:ring-red-500" />
                @error('imagen')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
            </div>
            <div class="relative mb-4 mx-auto">
                <label for="ficha_tecnica" class="block font-medium text-sm text-gray-700 dark:text-white">
                    Seleccionar Ficha Tecnica (PDF)
                </label>
                <input type="file" id="ficha_tecnica" name="ficha_tecnica" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 focus:border-red-500 focus:ring-red-500" />
                @error('ficha_tecnica')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
            </div>
            <a class="inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 mr-2 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 darK:active:bg-gray-700 focus:ring-gray-500" href="{{ route('autos.index') }}">Regresar</a>
            <button class="inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 ml-2 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 darK:active:bg-gray-700 focus:ring-gray-500" type="submit">Guardar Cambios</button>
        </form>
    </div>
  </div>
</x-app-layout>