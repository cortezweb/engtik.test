<div class="max-w-5xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-8 text-center text-indigo-700">
        Carrito de Compras
    </h1>
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-7">
        {{-- SubTotal de Compra  --}}
        <div class="lg:col-span-3">
            <div class="bg-white rounded-lg shadow-lg p-6">
                @if(Cart::instance('shopping')->count())
                <table class="w-full text-left border-separate border-spacing-y-2">
                    <thead>
                        <tr class="text-gray-600 text-sm">
                            <th>Imagen</th>
                            <th>Curso</th>
                            <th>Profesor</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::instance('shopping')->content() as $item)
                        <tr class="bg-gray-50 rounded-lg">
                            <td class="py-2">
                                <img alt="{{$item->name}}" src="{{$item->options->image}}" class="w-24 h-16 object-cover rounded-lg border">
                            </td>
                            <td class="font-semibold">
                                <a href="#" class="hover:text-indigo-600 transition">{{$item->name}}</a>
                            </td>
                            <td class="text-gray-500">{{$item->options->teacher}}</td>
                            <td class="font-bold text-indigo-700">{{number_format($item->price,2)}} USD</td>
                            <td>
                                <button wire:click="remove('{{$item->rowId}}')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded shadow">Eliminar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="text-center py-10">
                    <p class="text-gray-500 text-lg mb-4">Tu carrito está vacío.</p>
                    <a href="{{ route('courses.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition">Ver cursos</a>
                </div>
                @endif
            </div>

            @if (Cart::instance('shopping')->count())

                        <button
                        wire:click="destroy"
                        class="mt-4 font-semibold text-red-500 text-sm">
                            <i class="fas fa-trash-alt mr-2"></i>
                            Vaciar el Carrito de Compras
                        </button>

            @endif

        </div>

        {{-- Resumen de compra --}}

         <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-lg p-6 sticky top-24">
                <h2 class="text-xl font-bold mb-4 text-gray-800">Resumen de compra</h2>
                <ul class="mb-4">
                    @foreach (Cart::instance('shopping')->content() as $item)
                        <li class="flex justify-between py-2 border-b text-gray-700">
                            <span>{{ $item->name }}</span>
                            <span>{{ number_format($item->price * $item->qty,2) }} USD</span>
                        </li>
                    @endforeach
                </ul>
                <div class="flex justify-between items-center text-lg font-bold mb-6">
                    <span>Total:</span>
                    <span class="text-indigo-700">
                        @php
                            $total = 0;
                            foreach (Cart::instance('shopping')->content() as $item) {
                                $total += $item->price * $item->qty;
                            }
                        @endphp
                        {{ number_format($total,2) }} USD
                    </span>
                </div>

                <div class="mt-6">

                    @if (Cart::instance('shopping')->count())

                    <a href="{{route('checkout.index')}}" class="w-full block text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg shadow transition">
                        Proceder con el Pago
                    </a>
                    @else
                    <button disabled class="w-full block text-center bg-gray-400 text-white font-semibold py-3 px-4 rounded-lg shadow transition cursor-not-allowed">
                        Proceder con el Pago
                    </button>
                    @endif

                </div>


            </div>
        </div>



        {{-- version 1.1 --}}



    </div>
</div>
