<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TIENDA') }}
        </h2>
    </x-slot>
    <x-slot name="scripts">        /
        <script src="https://sdk.mercadopago.com/js/v2"></script>

        <script>
            // Agrega credenciales de SDK
            const mp = new MercadoPago('TEST-b86adc2b-5e8a-4f57-8fa9-93157296c74b', {
                locale: 'es-AR'
            });

            // Inicializa el checkout
            mp.checkout({
                preference: {
                    id: '212266020-ca897c4c-d2d3-488a-b917-8b99bcf63ca2'
                },
                render: {
                    container: '.checkout-button', // Indica dónde se mostrará el botón de pago
                    label: 'Comprar', // Cambia el texto del botón de pago (opcional)
                }
            });
        </script>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <div class="text-gray-900 bg-gray-200">
                        <div class="p-4 flex">
                            <h1 class="text-3xl">
                                Productos
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
                                    <th class="text-left p-3 px-5">Nombre</th>
                                    <th class="text-left p-3 px-5">Descripción</th>
                                    <th class="text-left p-3 px-5">Precio</th>
                                    <th class="text-left p-3 px-5">Cantidad</th>
                                    <th></th>
                                </tr>
                                @foreach ($products as $product)
                                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                        <td class="p-3 px-5">{{ $product['name'] }}</td>
                                        <td class="p-3 px-5">{{ $product['description'] }}</td>
                                        <td class="p-3 px-5">${{ $product['price']/100 }}</td>

                                        <td>
                                            <form id="product-form" method="POST"
                                                  action="{{ route('createOrder', ['id' => $product->getId()]) }}" accept-charset="UTF-8">
                                                {{ csrf_field() }}
                                            <input type="number" name="quantity" min="1" step="1" class="h-3 p-6 border-2 border-gray-300 mb-5 rounded-md">
                                            </form>
                                        </td>
                                        <td class="p-3 px-5 flex justify-end"><button form= "product-form" class=" checkout-button mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Comprar</button></td>
                                    @endforeach
                                </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
