<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-gray-900 bg-gray-200">
                        <div class="px-4 pt-4 flex justify-center items-center text-center ">
                            <h1 class="text-3xl ">
                                Orden de Compra
                            </h1>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    @if ($errors->any())
                                        <div class="alert alert-danger" data-dismiss="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="px-3 py-4 flex justify-center">
                            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                                <tbody>
                                <tr class="border-b">
                                    <th class="text-center p-3 px-5">Nombre</th>
                                    <th class="text-center p-3 px-5">Descripción</th>
                                    <th class="text-center p-3 px-5">Cantidad</th>
                                    <th class="text-center p-3 px-5">Precio Total</th>
                                    <th class="text-center p-3 px-5"></th>
                                </tr>
                                    <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                        <td class="p-3 px-5 text-center">{{ $product['name'] }}</td>
                                        <td class="p-3 px-5 text-center">{{ $product ['description'] }}</td>
                                        <td class="p-3 px-5 text-center">{{ $order ['quantity'] }}</td>
                                        <td class="p-3 px-5 text-center">${{ $order['amount'] }}</td>
                                        <td class="p-3 px-5 text-center">
                                            <div class="cho-container"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("{{config('services.mercadoPago.key')}}", {
            locale: 'es-AR'
        })
        const checkout = mp.checkout({
            preference: {
                id: {!!json_encode($order['preference_id']) !!},
            }
        });
        checkout.render({
            container: '.cho-container',
            label: 'Pagar',
        });
    </script>
</x-app-layout>





