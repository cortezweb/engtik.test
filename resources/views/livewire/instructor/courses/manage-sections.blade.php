<div>

    <form wire:submit="store">
        <div class="bg-gray-100 rounded-lg shadow-lg p-6">
            <x-label>
                Nuevo Sección
            </x-label>

            <x-input wire:model="name" class="w-full" placeholder="Ingrese el nombre de la Section"/>

            <x-input-error for="name" class="mt-2"/>


            <div class="flex justify-end mt-4">
                <x-button>
                    Agregar Section
                </x-button>

            </div>
        </div>
    </form>


</div>
