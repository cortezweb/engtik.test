<div>
    @if (Cart::instance('shopping')->content()->where('id', $course->id)->first())
            <button
                wire:key="removeCart"
                wire:click="removeCart"
            class="w-full bg-blue-600 hover:bg-blue-700 uppercase text-white font-semibold py-2 px-4 rounded-lg mb-4">
                Eliminar del carrito
            </button>
    @else
            <button
                wire:key="addCart"
                wire:click="addCart"
            class="w-full bg-blue-600 hover:bg-blue-700 uppercase text-white font-semibold py-2 px-4 rounded-lg mb-4">
                Agregar al carrito
            </button>
    @endif




    <a href="">
        <button class="w-full bg-red-600 hover:bg-red-700 uppercase text-white font-semibold py-2 px-4 rounded-lg mb-4">
            Inscribirme ahora
        </button>
    </a>
</div>
