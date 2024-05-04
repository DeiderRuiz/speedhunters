<x-guest-layout>
    <x-slot name="titulo">
        PQRS
    </x-slot>
    @if (session('success'))
        <div
            class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl">
                <form
                    class="p-4 bg-white border border-gray-200 sm:rounded-lg grid grid-cols-1 md:grid-cols-2 gap-4 dark:bg-gray-800 dark:border-gray-400"
                    action="{{ route('pqrs.store') }}" method="POST">
                    @csrf
                    <div class="justify-center items-center p-2">
                        <div class="relative mb-4">
                            <label for="tipo" class="block font-medium text-sm text-gray-700 dark:text-white">Tipo
                                De PQRS</label>
                            <select name="tipo" id="opcion"
                                class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700">
                                <option value="">Seleccionar</option>
                                <option value="Petición">Petición</option>
                                <option value="Queja">Queja</option>
                                <option value="Reclamo">Reclamo</option>
                                <option value="Sugerencia">Sugerencia</option>
                                <option value="Felicitación">Felicitación</option>
                            </select>
                            @error('tipo')
                                <small class="font-bold text-red-500/80">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="relative mb-4">
                            <textarea id="descripcion" name="descripcion" placeholder="Describa su PQRS"
                                class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700">{{ old('descripcion', $pqrs->descripcion) }}</textarea>
                            @error('descripcion')
                                <small class="font-bold text-red-500/80">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="justify-center items-center p-2">
                        <div class="relative mb-4">
                            <label for="cc" class="block font-medium text-sm text-gray-700 dark:text-white">Numero
                                De Identidad</label>
                            <input type="text" id="cc" name="cc" placeholder="Numero De Identidad"
                                value="{{ old('cc', $pqrs->cc) }}"
                                class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700" />
                            @error('cc')
                                <small class="font-bold text-red-500/80">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="relative mb-4">
                            <label for="name"
                                class="block font-medium text-sm text-gray-700 dark:text-white">Nombre</label>
                            <input type="text" id="name" name="name" placeholder="Nombre"
                                value="{{ old('name', $pqrs->name) }}"
                                class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700" />
                            @error('name')
                                <small class="font-bold text-red-500/80">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="relative mb-4">
                            <label for="last_name"
                                class="block font-medium text-sm text-gray-700 dark:text-white">Apellidos</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Apellidos"
                                value="{{ old('last_name', $pqrs->last_name) }}"
                                class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700" />
                            @error('last_name')
                                <small class="font-bold text-red-500/80">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="relative mb-4">
                            <label for="cellphone"
                                class="block font-medium text-sm text-gray-700 dark:text-white">Telefono</label>
                            <input type="text" id="cellphone" name="cellphone" placeholder="Telefono"
                                value="{{ old('cellphone', $pqrs->cellphone) }}"
                                class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700" />
                            @error('cellphone')
                                <small class="font-bold text-red-500/80">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="relative mb-4">
                            <label for="email"
                                class="block font-medium text-sm text-gray-700 dark:text-white">Email</label>
                            <input type="text" id="email" name="email" placeholder="Email"
                                value="{{ old('email', $pqrs->email) }}"
                                class="border-gray-300 text-sm focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm block w-full dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700" />
                            @error('email')
                                <small class="font-bold text-red-500/80">{{ $message }}</small>
                            @enderror
                        </div>
                        <a class="inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 mr-2 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 darK:active:bg-gray-700 focus:ring-gray-500" href="{{ route('index') }}">
                          Regresar
                        </a>
                        <button class="inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 mr-2 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 darK:active:bg-gray-700 focus:ring-gray-500" type="submit">
                          Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/js.js"></script>
</x-guest-layout>
