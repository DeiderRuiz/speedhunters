<x-guest-layout>
    <x-slot name="titulo">
        Cotizar
    </x-slot>
    @if(session('success'))
      <div class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
        {{ session('success') }}
      </div>
    @endif
    <div class="grid grid-cols-2 gap-2">
        <div class="w-full mx-auto sm:px-6 lg:px-8 py-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border-b border-gray-200">
                <div class="bg-red-500 py-4">
                    <h1 class="text-center text-xl font-bold text-white">Solicitud De Cotización</h1>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <tbody>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-y dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                ID
                            </th>
                            <td class="px-6 py-4">
                                {{$cotizacion->id}}
                            </td>
                        </tr>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                CC del cliente
                            </th>
                            <td class="px-6 py-4">
                                {{$cotizacion->user->cc}}
                            </td>
                        </tr>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Nombre del cliente
                            </th>
                            <td class="px-6 py-4">
                                {{$cotizacion->user->name}} {{$cotizacion->user->last_name}}
                            </td>
                        </tr>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Telefono
                            </th>
                            <td class="px-6 py-4">
                                {{$cotizacion->user->cellphone}}
                            </td>
                        </tr>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Correo Electrónico
                            </th>
                            <td class="px-6 py-4">
                                {{$cotizacion->user->email}}
                            </td>
                        </tr>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Auto solicitado
                            </th>
                            <td class="px-6 py-4">
                                {{$cotizacion->auto->marca}} {{$cotizacion->auto->modelo}} {{$cotizacion->auto->years}}
                            </td>
                        </tr>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Valor del auto
                            </th>
                            <td class="px-6 py-4">
                                {{$cotizacion->auto->precio}}
                            </td>
                        </tr>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Fecha estimada de Cotización
                            </th>
                            <td class="px-6 py-4">
                                {{$cotizacion->fecha}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-full mx-auto sm:px-6 lg:px-8 py-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border-b border-gray-200 p-4">
                <h1 class="text-xl font-bold text-red-500">Gracias por su solicitud de cotización</h1>
                <p>
                    Hemos recibido su solicitud para cotizar un auto en nuestro concesionario. Un miembro de nuestro equipo se pondrá en contacto con usted de 3 a 4 días, ya sea por teléfono o correo electrónico, para confirmar o rechazar su solicitud.
                </p>
                <p>
                    En caso de que su solicitud sea aprobada, le pedimos que <a href="{{ route('cotizacion.pdf') }}?id={{ $cotizacion->id }}" target="_blank" class="text-red-500 font-bold italic">descargue</a> y lleve consigo la solicitud de cotización al concesionario en la fecha para la que se realizó la solicitud. Este documento será necesario para confirmar la compra del auto.
                </p>
                <p>
                    Agradecemos su interés y esperamos poder ayudarlo a encontrar el auto perfecto para usted.
                </p>
                <p class="italic">
                    Saludos cordiales, <span class="font-bold">SPEEDHUNTERS</span>
                </p>
                <a class="inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 my-2" href="{{ route('cotizacion.pdf') }}?id={{ $cotizacion->id }}" target="_blank">Ver y descargar Solicitud</a>
            </div>
        </div>
    </div>
    <script src="/js/js.js"></script>
  </x-guest-layout>