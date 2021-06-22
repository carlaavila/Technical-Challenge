<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pago Pendiente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <div class="text-gray-900 bg-gray-200">
                        <div class="p-4 flex">
                            <h1 class="text-3xl text-center">
                                El pago se encuentra pendiente
                            </h1>
                        </div>
                        <!-- component -->
                        <div class="w-2/3 mx-auto">
                            <div class="bg-white shadow-md rounded my-6">
                                <table class="text-left w-full border-collapse">
                                    <thead>
                                    <tr>
                                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Información del producto</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="hover:bg-grey-lighter">
                                        <td class="py-4 px-6  font-bold">Nombre</td>
                                        <td class="py-4 px-6 ">{{ $product['name'] }}</td>
                                    </tr>
                                    <tr class="hover:bg-grey-lighter">
                                        <td class="py-4 px-6  font-bold">Descripción</td>
                                        <td class="py-4 px-6 ">{{ $product['description'] }}</td>
                                    </tr>
                                    <tr class="hover:bg-grey-lighter">
                                        <td class="py-4 px-6 font-bold">Cantidad</td>
                                        <td class="py-4 px-6 ">{{ $order ['quantity'] }}</td>
                                    </tr>
                                    <tr class="hover:bg-grey-lighter">
                                        <td class="py-4 px-6  font-bold">Importe total</td>
                                        <td class="py-4 px-6 ">${{ $order ['amount'] }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
