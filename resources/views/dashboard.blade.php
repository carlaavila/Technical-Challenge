<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TIENDA') }}
        </h2>
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
                                    @if($errors->any())
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
                                    <th class="text-left p-3 px-5 text-center">Nombre</th>
                                    <th class="text-left p-3 px-5 text-center">Descripción</th>
                                    <th class="text-left p-3 px-5 text-center">Precio</th>
                                    <th class="text-left p-3 px-5 text-center">Cantidad</th>
                                    <th></th>
                                </tr>
                                @foreach ($products as $product)
                                    <form  method="POST"
                                          action="{{ route('createOrder', ['id' => $product->getId()]) }}" accept-charset="UTF-8">
                                        {{ csrf_field() }}
                                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                        <td class="p-3 px-5 text-center">{{ $product['name'] }}</td>
                                        <td class="p-3 px-5 text-center">{{ $product['description'] }}</td>
                                        <td class="p-3 px-5 text-center">${{ $product['price']/100 }}</td>
                                        <td >
                                            <div class="flex items-center text-center justify-center w-full">
                                                <input type="number" name="quantity" min="1" step="1" class="  w-1/4 border-2 border-gray-300 my-2 rounded-md text-center">
                                            </div>
                                        </td>
                                        <td class="p-3 px-5 flex justify-center"><button type="submit" class=" mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Comprar</button></td>
                                    </form>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
