<form wire:submit="update">
    <div class="flex items-center space-x-2">
        <x-label>
            Seccion: {{$section->position}}
        </x-label>

            <x-input wire:model="sectionEdit.name" class="flex-1"/>
    </div>

    <div class="flex justify-end mt-4">
        <div class="space-x-2">
            <x-danger-button wire:click="$set('sectionEdit.id', null)">
                Cancelar
            </x-danger-button>

            <x-button class="ml-2">
                Actualizar
            </x-button>
        </div>



    </div>

</form>
