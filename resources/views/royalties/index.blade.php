<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap md:flex-wrap justify-center">
            <div class="content-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Regalías') }}
                </h2>
            </div>
            <div class="w-64 ">

            </div>
            @role(['super-admin'])
                <div class="p-4">
                    <a class="bg-sky-700 px-4 py-2 text-white hover:bg-sky-800 sm:px-8 sm:py-3 rounded-lg mx-8"
                        href="#"> Abonar relagías</a>
                </div>
            @endrole
        </div>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div>
                        <a href="#"
                            class="block text-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Total obras vendidas</h5>
                            <h1 class="text-center text-4xl font-extrabold">{{ $allRoyalties['total_sales'] }}</h1>
                        </a>
                    </div>
                    <div>
                        <a href="#"
                            class="block text-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Saldo actual</h5>
                            <h1 class="text-center text-4xl font-extrabold">$ {{ $allRoyalties['total_royalties'] }}
                            </h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <h1 class="text-2xl">Historial de ventas</h1>
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Fecha</th>
                                            <th scope="col" class="px-6 py-4">Obra</th>
                                            <th scope="col" class="px-6 py-4">Método de pago</th>
                                            <th scope="col" class="px-6 py-4">Valor neto</th>
                                            <th scope="col" class="px-6 py-4">Comisión pasarela</th>
                                            <th scope="col" class="px-6 py-4">Impuesto</th>
                                            <th scope="col" class="px-6 py-4">Comisión TP</th>
                                            <th scope="col" class="px-6 py-4">Monto neto del autor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <td class="whitespace-nowrap px-6 py-4"></td>
                                        <td class="whitespace-nowrap px-6 py-4">Ventanas hacia el alma</td>
                                        <td class="whitespace-nowrap px-6 py-4">PayPal</td>
                                        <td class="whitespace-nowrap px-6 py-4">20.00</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-red-600">- 1.20</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-red-600">- 0</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-red-600">- 1.98</td>
                                        <td class="whitespace-nowrap px-6 py-4">18.02</td> --}}


                                        @foreach ($salesHistory as $key => $sale)
                                            <tr
                                                class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                <td class="whitespace-nowrap px-6 py-4">{{ $sale['fecha'] }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $sale['obra'] }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $sale['metodo'] }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $sale['valor_neto'] }}</td>
                                                <td class="whitespace-nowrap px-6 py-4 text-red-600">-
                                                    {{ $sale['comision_pasarela'] }}</td>
                                                <td class="whitespace-nowrap px-6 py-4 text-red-600">-
                                                    {{ $sale['impuesto'] }}</td>
                                                <td class="whitespace-nowrap px-6 py-4 text-red-600">-
                                                    {{ $sale['comision_tp'] }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $sale['neto_autor'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- {!! $salesHistory->render() !!} --}}
            </div>
        </div>
    </div>
</x-app-layout>
