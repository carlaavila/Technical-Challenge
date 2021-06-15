<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir Productos') }}
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

                        <div>
                            <button onclick="openModal('main-modal')" class="w-full py-3 mt-10 bg-gray-800 rounded-sm
                             font-medium text-white uppercase focus:outline-none hover:bg-gray-700 hover:shadow-none" >Agregar Productos</button>
                        </div>
                        <div class="px-3 py-4 flex justify-center">
                            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                                <tbody>
                                <tr class="border-b">
                                    <th class="text-left p-3 px-5">Nombre</th>
                                    <th class="text-left p-3 px-5">Descripción</th>
                                    <th class="text-left p-3 px-5">Precio</th>
{{--                                    <th class="text-left p-3 px-5">Cantidad</th>--}}
                                </tr>
                                @foreach ($products as $product)
                                    <tr class="border-b hover:bg-orange-100 bg-gray-100">

                                        <td class="p-3 px-5">{{ $product['name'] }}</td>
                                        <td class="p-3 px-5">{{ $product['description'] }}</td>
                                        <td class="p-3 px-5">${{ $product['price']/100 }}</td>
{{--                                        <td class="p-3 px-5">{{ $product['quantity'] }}</td>--}}
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
</html>




<!-- component -->
<style>
    .animated {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }

    .animated.faster {
        -webkit-animation-duration: 500ms;
        animation-duration: 500ms;
    }

    .fadeIn {
        -webkit-animation-name: fadeIn;
        animation-name: fadeIn;
    }

    .fadeOut {
        -webkit-animation-name: fadeOut;
        animation-name: fadeOut;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }
</style>


<div class="main-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="border border-blue-500 shadow-lg modal-container bg-white w-4/12 md:max-w-11/12 mx-auto rounded-xl shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-500">Agregar Producto</p>
                <div class="modal-close cursor-pointer z-50" onclick="modalClose('main-modal')">
                    <svg class="fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                         viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>
            <!--Body-->
            <div class="my-5 mr-5 ml-5 flex justify-center">
                <form action="{{ route('createProduct') }}" method="POST" id="add_product_form"  class="w-full">
                    {{ csrf_field() }}
                    <div class="">
                        <div class="">
                            <label for="name" class="text-md text-gray-600">Nombre</label>
                        </div>
                        <div class="">
                            <input type="text" id="name" autocomplete="off" name="name" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" >
                        </div>
                        <div class="">
                            <label for="phone" class="text-md text-gray-600">Descripción</label>
                        </div>
                        <div class="">
                            <input type="text" id="description" autocomplete="off" name="description" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" >
                        </div>
                        <div class="">
                            <label class="text-md text-gray-600">Precio en $ (pesos)</label>
                        </div>
                        <div class="">
                            <input id="price" type="number" name="price" min="1.00" step="0.01" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" >

                </form>
            </div>
            <!--Footer-->
            <div class="flex justify-end pt-2 space-x-14">

                <button
                    class="px-4 bg-gray-200 p-3 rounded text-black hover:bg-gray-300 font-semibold" onclick="modalClose('main-modal')">Cancelar</button>
                <button type="submit"
                        class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400" form="add_product_form">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<script>
    all_modals = ['main-modal']
    all_modals.forEach((modal)=>{
        const modalSelected = document.querySelector('.'+modal);
        modalSelected.classList.remove('fadeIn');
        modalSelected.classList.add('fadeOut');
        modalSelected.style.display = 'none';
    })
    const modalClose = (modal) => {
        const modalToClose = document.querySelector('.'+modal);
        modalToClose.classList.remove('fadeIn');
        modalToClose.classList.add('fadeOut');
        setTimeout(() => {
            modalToClose.style.display = 'none';
        }, 500);
    }

    const openModal = (modal) => {
        const modalToOpen = document.querySelector('.'+modal);
        modalToOpen.classList.remove('fadeOut');
        modalToOpen.classList.add('fadeIn');
        modalToOpen.style.display = 'flex';
    }

</script>
