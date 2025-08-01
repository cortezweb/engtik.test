<div>

    @if (count($requirements))

    <ul class="space-y-4 mb-4" id="requirements">
        @foreach ($requirements as $index => $requirement)
        <li wire:key="requirement-{{$requirement['id']}}" data-id="{{$requirement['id']}}">

        <div class="flex">

            <x-input wire:model="requirements.{{$index}}.name" class="flex-1 rounded-r-none"/>

            <div class="flex border border-l-0 border-gray-300 divide-x divide-gray-300 rounded-r">

                <button onclick="destroyRequirement({{$requirement['id']}})" class="px-2 hover:text-red-500">
                    <i class="far fa-trash-alt"></i>
                </button>

                <div class="flex items-center px-2 cursor-move">
                    <i class="fas fa-bars"></i>
                </div>


            </div>

        </div>

        </li>

        @endforeach
    </ul>


    <div class="flex justify-end mb-8">
        <x-button wire:click="update">
            Actualizar
        </x-button>

    </div>

    @endif


    <form wire:submit="store">
        <div class="bg-gray-100 rounded-lg shadow-lg p-6">
            <x-label>
                Nuevo Requerimiento
            </x-label>

            <x-input wire:model="name" class="w-full" placeholder="Ingrese el nombre de la Requerimiento"/>

            <x-input-error for="name" class="mt-2"/>


            <div class="flex justify-end mt-4">
                <x-button>
                    Agregar Requerimiento
                </x-button>

            </div>
        </div>
    </form>

    @push('js')

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>

    <script>
        const requirements = document.getElementById('requirements');
        new Sortable(requirements, {
            animation: 150,
            ghostClass: 'blue-background-class',
            store: {
                set: (sortable) => {

                    @this.call('sortrequirements', sortable.toArray());
                }
            }
        });

    </script>


        <script>
            function destroyRequirement(id){
                            Swal.fire({
            title: "¿Estás seguro?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminarlo!",
            cancelButtonText: "Cancelar"
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                title: "Requerimiento eliminada correctamente",
                text: "El requerimiento del curso ha sido eliminada exitosamente.",
                icon: "success"
                });

               @this.call('destroy', id);
            }
            });
            }
        </script>
    @endpush


</div>
