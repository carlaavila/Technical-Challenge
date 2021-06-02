<!-- component -->
<!-- Root element for center items -->
<div class="flex flex-col h-screen bg-gray-100">
    <!-- Auth Card Container -->
    <div class="grid place-items-center mx-2 my-20 sm:my-auto">
        <!-- Auth Card -->
        <div class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12
            px-6 py-10 sm:px-10 sm:py-6
            bg-white rounded-lg shadow-md lg:shadow-lg">

            <!-- Card Title -->
            <h2 class="text-center font-semibold text-3xl lg:text-4xl text-gray-800">
                Agregar Producto
            </h2>

            <form class="mt-10" method="POST">
                <label  class="block text-xs font-semibold text-gray-600 uppercase">Nombre</label>
                <input id="name" type="text" name="name"
                       class="block w-full py-3 px-1 mt-2
                    text-gray-800 appearance-none
                    border-b-2 border-gray-100
                    focus:text-gray-500 focus:outline-none focus:border-gray-200"
                       required />


                <label class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Descripción</label>
                <input id="description" type="text" name="description"
                       class="block w-full py-3 px-1 mt-2 mb-4
                    text-gray-800 appearance-none
                    border-b-2 border-gray-100
                    focus:text-gray-500 focus:outline-none focus:border-gray-200"
                />

                <label>Precio en $ (pesos)</label>
                <span class="input-group-addon"><strong>$</strong></span>
                <input id="price" type="number" name="price" min="1.00" step="0.01"
                       class="block w-full py-3 px-1 mt-2 mb-4
                    text-gray-800 appearance-none
                    border-b-2 border-gray-100
                    focus:text-gray-500 focus:outline-none focus:border-gray-200"
                       required />

                <button type="submit"
                        class="w-full py-3 mt-10 bg-gray-800 rounded-sm
                                font-medium text-white uppercase
                                focus:outline-none hover:bg-gray-700 hover:shadow-none">
                    Guardar
                </button>

            </form>
        </div>
    </div>
</div>
