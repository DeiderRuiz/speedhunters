<x-guest-layout>
    <x-slot name="titulo">
      Auto
    </x-slot>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ $auto->marca }} {{$auto->modelo}}
      </h2>
    </x-slot>
    <h1>Autos</h1>
      <p>Vista previa de los autos</p>
  </x-guest-layout>