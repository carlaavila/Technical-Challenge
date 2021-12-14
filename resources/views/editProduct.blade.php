<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TIENDA') }}
        </h2>
    </x-slot>

<div class="main-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="border border-blue-500 shadow-lg modal-container bg-white w-4/12 md:max-w-11/12 mx-auto rounded-xl shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-500">Editar Producto</p>
            </div>
            <!--Body-->
            <div class="my-5 mr-5 ml-5 flex justify-center">
                <form method="POST" action="{{ route('updateProduct', ['id'=>$product->getId()]) }}"   class="w-full">
                    @csrf
                    <div class="">
                        <div class="">
                            <label for="name" class="text-md text-gray-600">Nombre</label>
                        </div>
                        <div class="">
                            <input type="text" id="name" autocomplete="off" name="name" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" value="{{ $product['name'] }}" >
                        </div>
                        <div class="">
                            <label for="phone" class="text-md text-gray-600">Descripción</label>
                        </div>
                        <div class="">
                            <input type="text" id="description" autocomplete="off" name="description" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" value="{{ $product['description'] }}" >
                        </div>
                        <div class="">
                            <label class="text-md text-gray-600">Precio en $ (pesos)</label>
                        </div>
                        <div class="">
                            <input id="price" type="number" name="price" min="1.00" step="0.01" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" value="{{ $product['price']/100 }}">
                        </div>
                    </div>
                    <div class="flex justify-end pt-2 space-x-14">
                        <a class="px-4 bg-gray-200 p-3 rounded text-black hover:bg-gray-300 font-semibold" href="{{ route('createProductView')}}" >Cancelar</a>
                        <button type="submit" class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400" >Confirmar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

</x-app-layout>
