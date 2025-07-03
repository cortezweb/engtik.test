<div>

    <ul class="space-y-4 mb-6">
        @foreach ($goals as $index => $goal)
        <li wire:key="goal-{{$goal['id']}}">
            <x-input wire:model="goals.{{$index}}.name" class="w-full"/>
        </li>

        @endforeach
    </ul>


    <form wire:submit="store">
        <div class="bg-gray-100 rounded-lg shadow-lg p-6">
            <x-label>
                Nueva Meta
            </x-label>

            <x-input wire:model="name" class="w-full" placeholder="Ingrese el nombre de la Meta"/>
            <x-input-error for="name" class="mt-2"/>


            <div class="flex justify-end mt-4">
                <x-button>
                    Agregar Meta
                </x-button>

            </div>
        </div>
    </form>


</div>
