<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<header>
    <h1>Estado de la compra</h1>
</header>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
            <div class="p-6 bg-white border-b border-gray-200 ">
                <div class="text-gray-900 bg-gray-200">
                    <div class="p-4 flex">
                    </div>
                    <!-- component -->
                    <div class="w-2/3 mx-auto">
                        <div class="bg-white shadow-md rounded my-6">
                            @if($payment['payment_status'] === 'approved')
                                <div style=" padding: 20px; border-bottom: rgba(128, 128, 128, 0.267) solid 2px;">
                                    <div class="titleEmail-custom"
                                         style="text-align:center; font-size: 19px;">
                                        <strong>
                                            Su pedido ha sido registrado correctamente!
                                        </strong>
                                        <p class="py-4 px-6  font-bold">Número de operación</p>
                                        <p class="py-4 px-6 ">{{ $payment['external_id'] }}</p>
                                    </div>
                                </div>
                            @elseif($payment['payment_status'] === 'reject')
                                <div style=" padding: 20px; border-bottom: rgba(128, 128, 128, 0.267) solid 2px;">
                                    <div class="titleEmail-custom"
                                         style="text-align:center; font-size: 19px;">
                                        <strong>
                                            Su pedido ha sido cancelado.
                                        </strong>
                                        <p class="py-4 px-6  font-bold">Número de operación</p>
                                        <p class="py-4 px-6 ">{{ $payment['external_id'] }}</p>
                                    </div>
                                </div>
                            @endif
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
                                    <td class="py-4 px-6 ">{{ $order['product']['name']}}</td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6  font-bold">Descripción</td>
                                    <td class="py-4 px-6 ">{{ $order['product']['description'] }}</td>
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

</body>
</html>
